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

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

            //get carts data
            $carts = Cart::with(['product'])->where('user_id', Auth::user()->id)->get();
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
            ]);

            //list transaksi
            foreach ($carts as $cart) {
                $items[] = OrderDetail::create([
                    'user_id' => $cart->user_id,
                    'order_id' => $transaksi->id,
                    'product_id' => $cart->product_id,
                    'qty' => $cart->quantity,
                ]);
            }

            //delete cart
            Cart::where('user_id', Auth::user()->id)->delete();

            //konfigurasi midtrans
            Config::$serverKey = config('services.midtrans.serverKey');
            Config::$isProduction = config('services.midtrans.isProduction');
            Config::$isSanitized = config('services.midtrans.isSanitized');
            Config::$is3ds = config('services.midtrans.is3ds');

            //setup variable midtrans
            $midtrans = [
                'transaction_details' => [
                    'order_id' => 'TS-Tes-' . $transaksi->id,
                    'gross_amount' => (int) $transaksi->total_price,
                ],
                'customer_details' => [
                    'first_name' => $transaksi->name,
                    'email' => $transaksi->email,
                ],
                'enabled_payments' => ['gopay', 'bank_transfer', 'bca_va'],
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
        } else {
            return redirect('shopCart');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
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

    public function history($id)
    {
        $order = Order::where('user_id', $id)->get();

        return view('toyspace.page.pesanan_saya', compact('order'));
    }
    //detail order history
    public function historyDetails($id)
    {
        $order = Order::where('user_id', $id)->get();

        return view('toyspace.page.detail_pesanan', compact('order'));
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
        $totalProductsSold = OrderDetail::sum('qty');

        $productsOutOfStock = Product::where('stock', 0)->count();

        return view('admin.index', compact('totalProductsSold', 'productsOutOfStock'));
    }
}
