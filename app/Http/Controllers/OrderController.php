<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;
use Exception;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->query('status');

        if ($status == 'all') {
            $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        } elseif ($status == 'processed') {
            $orders = Order::where('status', 'SUCCESS')->orderBy('created_at', 'desc')->paginate(10);
        } elseif ($status == 'unpaid') {
            $orders = Order::where('status', 'PENDING')->orderBy('created_at', 'desc')->paginate(10);
        } elseif ($status == 'shipped') {
            $orders = Order::where('status', 'SEND')->orderBy('created_at', 'desc')->paginate(10);
        } elseif ($status == 'canceled') {
            $orders = Order::where('status', 'CANCELED')->orderBy('created_at', 'desc')->paginate(10);
        } elseif ($status == 'completed') {
            $orders = Order::where('status', 'FINISHED')->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        }

        return view('admin.page.orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $id, UserAddress $address)
    {
        if ($id->id == Auth::user()->id) {

            $cartsArray = json_decode($request->input('carts'));

            $cartIds = array_column($cartsArray, 'id');
            $carts = Cart::with('product')
                ->whereIn('id', $cartIds)
                ->get();
                
            if ($carts->isEmpty()) {
                toast('Keranjang kosong', 'error');

                return redirect()->route('home');
            } else {
                $ongkir = json_decode($request->ongkir, true);
                $total = 0;

                foreach ($carts as $cart) {
                    $total = $total + ($cart->quantity * $cart->product->price);
                }

                foreach ($carts as $cart) {
                    $stock = $cart->product->stock - $cart->quantity;
                    if ($stock < 0) {
                        $cart->update(['quantity' => $cart->product->stock]);

                        return redirect('shopCart');
                    } else {
                        Product::where('id', $cart->product_id)->update([
                            'stock' => $stock,
                        ]);
                    }
                }

                //membuat transaksi
                $transaksi = Order::create([
                    'user_id' => Auth::user()->id,
                    'name' => $address->nama,
                    'email' => Auth::user()->email,
                    'address' => $address->provinsi . ", " . $address->kota . ", " . $address->alamat_lengkap . " (" . $address->kode_pos . ")",
                    'phone' => $address->phone,
                    'courier' => "JNE (" . $ongkir['nama'] . ")",
                    'total_price' => $total + $ongkir['harga'],
                    'ongkir_price' => $ongkir['harga'],
                ]);

                //list transaksi
                foreach ($carts as $cart) {
                    OrderDetail::create([
                        'user_id' => $cart->user_id,
                        'order_id' => $transaksi->id,
                        'product_id' => $cart->product_id,
                        'qty' => $cart->quantity,
                    ]);
                }

                //delete cart
                $carts->each(function ($cart) {
                    $cart->delete();
                });

                //konfigurasi midtrans
                Config::$serverKey = config('services.midtrans.serverKey');
                Config::$isProduction = config('services.midtrans.isProduction');
                Config::$isSanitized = config('services.midtrans.isSanitized');
                Config::$is3ds = config('services.midtrans.is3ds');

                //setup variable midtrans
                $midtrans = [
                    'transaction_details' => [
                        'order_id' => 'typsc-' . $transaksi->id,
                        'gross_amount' => (int) $transaksi->total_price,
                    ],
                    'customer_details' => [
                        'first_name' => $transaksi->name,
                        'email' => $transaksi->email,
                    ],
                    'enabled_payments' => ['gopay', 'bank_transfer'],
                    'vtweb' => [],
                ];

                //Payment Proccess
                try {
                    // Get Snap Payment Page URL
                    $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

                    $transaksi->payment_url = $paymentUrl;
                    $transaksi->save();

                    // Redirect to Snap Payment Page
                    return redirect($paymentUrl);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        } else {
            return redirect('shopCart');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('admin.page.order_show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function noresi(Request $request, Order $order)
    {
        $order->no_resi = $request->input('no_resi');
        $order->status = "SEND";
        $order->save();

        return back();
    }

    public function finishorder(Order $order)
    {
        $order->status = "FINISHED";
        $order->save();

        return back();
    }

    public function history()
    {
        $order = Order::where('user_id', Auth::user()->id)->with('order_details')->orderBy('created_at', 'desc')->get();

        $categories = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        return view('toyspace.page.pesanan_saya', compact('order', 'categories'));
    }

    //detail order history
    public function historyDetails(Order $order)
    {
        $categories = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        $orderDetails = $order->order_details()->with('product')->get();

        // foreach ($orderDetails as $key => $detail) {
        //     dd($detail->product->name);
        // }

        return view('toyspace.page.detail_pesanan', compact('order', 'categories', 'orderDetails'));
    }

    //contact Us
    public function contactUs()
    {
        $categories = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        return view('toyspace.page.contact_us', compact('categories'));
    }
    //About Us
    public function aboutUs()
    {
        $categories = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        return view('toyspace.page.about_us', compact('categories'));
    }

    public function dashboard()
    {
        $totalProductsSold = Order::where('status', 'FINISHED')
            ->with('order_details')
            ->get()
            ->pluck('order_details')
            ->flatten()
            ->sum('qty');

        $totalOrderToProceed = Order::where('status', 'SUCCESS')->count();

        $totalNotPaid = Order::where('status', 'PENDING')->orWhere('status', 'CANCELLED')->count();

        $productsOutOfStock = Product::where('stock', 0)->count();

        $orders = Order::with('order_details')
            ->orderByRaw("FIELD(status, 'SEND', 'SUCCESS') DESC")
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $salesData = Order::selectRaw('MONTHNAME(created_at) as month, SUM(total_price) as revenue')
            ->whereIn('status', ['SEND', 'FINISHED'])
            ->groupBy('month')
            ->orderByRaw('MIN(created_at)')
            ->get();

        // Mengubah data ke format yang bisa digunakan di chart.js
        $months = $salesData->pluck('month');
        $revenues = $salesData->pluck('revenue');

        return view('admin.index', compact('months', 'revenues', 'orders', 'totalProductsSold', 'productsOutOfStock', 'totalOrderToProceed', 'totalNotPaid'));
    }

    public function downloadPDF(Order $order)
    {
        $pdf = PDF::loadView('admin.page.order_show_download', compact('order'));
        return $pdf->download('invoice_'.$order->id.'.pdf');
    }
}
