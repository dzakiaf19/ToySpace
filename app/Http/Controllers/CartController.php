<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Alert;
use App\Models\Product;
use App\Models\UserAddress;
use App\Models\Category;

class CartController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function addCart(Request $request, Product $product)
    {
        $item = Cart::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
        if ($item != null) {
            if ($item->quantity + $request->quantity >= $product->stock) {
                toast('Max quantity', 'error');
            } else {
                $item->update(['quantity' => $item->quantity + $request->quantity]);
            }
        } else {
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        };

        return redirect('shopCart');
    }

    public function decrease(Request $request, $id)
    {
        $item = Cart::findOrFail($id);

        $item->update(['quantity' => $item->quantity - 1]);

        if ($item->quantity <= 0) {
            $item->delete();
            return response()->json(['message' => 'Item removed', 'status' => 'success'], 200);
        };

        return response()->json(['message' => 'Quantity decreased', 'status' => 'success', 'item' => $item], 200);
    }

    public function increase(Request $request, $id)
    {
        $item = Cart::findOrFail($id);

        if ($item->quantity + 1 > $item->product->stock) {
            return response()->json(['message' => 'Max quantity reached', 'status' => 'error'], 400);
        } else {
            $item->update(['quantity' => $item->quantity + 1]);
            return response()->json(['message' => 'Quantity increased', 'status' => 'success', 'item' => $item], 200);
        }
    }

    public function deleteCart(Request $request, $id)
    {
        $item = Cart::findOrFail($id);

        $item->delete();

        return response()->json(['message' => 'Item deleted successfully', 'status' => 'success'], 200);
    }

    public function shopCart()
    {
        $cityResponse = Http::withHeaders([
            'key' => 'ad16d62acd291a4aabb9694414cad4f3'
        ])->get('https://api.rajaongkir.com/starter/city');

        $provinceResponse = Http::withHeaders([
            'key' => 'ad16d62acd291a4aabb9694414cad4f3'
        ])->get('https://api.rajaongkir.com/starter/province');

        $cities = $cityResponse['rajaongkir']['results'];
        $provinces = $provinceResponse['rajaongkir']['results'];

        $alamat = UserAddress::where('user_id', Auth::user()->id)->first();

        $carts = Cart::with(['product'])->where('user_id', Auth::user()->id)->get();

        $categories = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        return view('toyspace.page.shop_cart', compact('carts', 'alamat', 'cities', 'provinces', 'categories'));
    }

    public function checkout(Request $request, $id, UserAddress $address)
    {
        if (Auth::user()->id == $id) {
            $selectedItems = $request->input('selected_items', []);

            // Fetch the selected cart items with the products
            $carts = Cart::with(['product'])
                ->whereIn('id', $selectedItems)
                ->where('user_id', $id)
                ->get();

            // dd($selectedItems);

            if ($address != null) {
                $cityResponse = Http::withHeaders([
                    'key' => 'ad16d62acd291a4aabb9694414cad4f3'
                ])->get('https://api.rajaongkir.com/starter/city');

                $provinceResponse = Http::withHeaders([
                    'key' => 'ad16d62acd291a4aabb9694414cad4f3'
                ])->get('https://api.rajaongkir.com/starter/province');

                $cities = $cityResponse['rajaongkir']['results'];
                $provinces = $provinceResponse['rajaongkir']['results'];

                // $carts = Cart::with(['product'])->where('user_id', $id)->get();

                $berat = 0;
                foreach ($carts as $cart) {
                    for ($i = 1; $i <= $cart->quantity; $i++) {
                        $berat = $berat + $cart->product->berat;
                    }
                }

                $cost = Http::withHeaders([
                    'key' => 'ad16d62acd291a4aabb9694414cad4f3'
                ])->post('https://api.rajaongkir.com/starter/cost', [
                    'origin' => '444',
                    'destination' => $address->kota_id,
                    'weight' => $berat,
                    'courier' => 'jne',
                ]);

                $costs = $cost['rajaongkir']['results'][0]['costs'];

                // dd($costs);

                $alamat = UserAddress::all()->where('user_id', $id);

                $categories = Category::withCount('products')
                    ->orderBy('products_count', 'desc')
                    ->get();

                return view('toyspace.page.checkout', compact('address', 'carts', 'costs', 'alamat', 'cities', 'provinces', 'categories'));
            } else {
                return redirect()->route('shopCart');
            }
        } else {
            toast('Error Page', 'error');
            return redirect()->route('shopCart');
        }
    }
}
