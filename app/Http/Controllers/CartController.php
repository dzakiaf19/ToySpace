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
        };

        return redirect('shopCart');
    }

    public function increase(Request $request, $id)
    {
        $item = Cart::findOrFail($id);

        if ($item->quantity + 1 > $item->product->stock) {
            toast('Max quantity', 'error');
        } else {
            $item->update(['quantity' => $item->quantity + 1]);
        }

        return redirect('shopCart');
    }

    public function deleteCart(Request $request, $id)
    {
        $item = Cart::findOrFail($id);

        $item->delete();

        toast('Item deleted successfully', 'success');

        return redirect('shopCart');
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

        return view('toyspace.page.shop_cart', compact('carts', 'alamat', 'cities', 'provinces'));
    }

    public function checkout($id, UserAddress $address)
    {
        if (Auth::user()->id == $id) {
            if ($address != null) {
                $cityResponse = Http::withHeaders([
                    'key' => 'ad16d62acd291a4aabb9694414cad4f3'
                ])->get('https://api.rajaongkir.com/starter/city');

                $provinceResponse = Http::withHeaders([
                    'key' => 'ad16d62acd291a4aabb9694414cad4f3'
                ])->get('https://api.rajaongkir.com/starter/province');

                $cities = $cityResponse['rajaongkir']['results'];
                $provinces = $provinceResponse['rajaongkir']['results'];

                $carts = Cart::with(['product'])->where('user_id', $id)->get();

                $berat = 0;
                foreach($carts as $cart) {
                    for ($i=1; $i <= $cart->quantity; $i++) { 
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

                return view('toyspace.page.checkout', compact('address', 'carts', 'costs', 'alamat', 'cities', 'provinces',));
            } else {
                return redirect()->route('shopCart');
            }
        } else {
            toast('Error Page', 'error');
            return redirect()->route('shopCart');
        }
    }
}
