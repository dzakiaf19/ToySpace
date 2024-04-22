<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $product = Product::all()->reverse();

        $title = 'Delete Product!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.page.show_product', compact('product'));
    }

    public function home()
    {
        //
        $product = Product::all();
        // dd($product->getFirstMediaUrl('images'));
        return view('toyspace.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cat = Category::all();
        return view('admin.page.add_product', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        //

        $product = Product::create([
            'name' => $request->input('name'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
            'desc' => $request->input('desc'),
            'cat_id' => $request->input('category_id'),
        ]);

        // dd($request->file('images'));

        // Simpan gambar ke tabel product_images


        if ($images = $request->file('images')) {
            foreach ($images as $image) {
                $product->addMedia($image)->toMediaCollection('images');
            }
        }

        toast('Your Post as been submited!', 'success');

        return redirect()->route('indexProduct');
    }

    public function addCart(Request $request, $id)
    {
        $item = Cart::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
        if ($item != null) {
            if ($item->quantity + $request->quantity >= 20) {
                toast('Max quantity', 'error');
            } else {
                $item->update(['quantity' => $item->quantity + $request->quantity]);
            }
        } else {
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $id,
                'quantity' => $request->quantity,
            ]);
        };

        return redirect('shopCart');
    }

    public function decrease(Request $request, $id)
    {
        $item = Cart::findOrFail($id);

        $item->update(['quantity' => $item->quantity - 1]);

        if ($item->quantity == 0) {
            $item->delete();
        };

        return redirect('shopCart');
    }

    public function increase(Request $request, $id)
    {
        $item = Cart::findOrFail($id);

        if ($item->quantity+1 > $item->product->stock) {
            toast('Max quantity', 'error');
        }else{
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



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $cat = Category::all();
        return view('admin.page.edit_product', compact('product', 'cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        //
        // dd($request->file('images'));

        $product->update([
            'name' => $request->input('name'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
            'desc' => $request->input('desc'),
            'cat_id' => $request->input('category_id'),
        ]);

        if ($request->hasFile('images')) {
            // dd(Storage::path($product->images[1]->path));
            // dd($product->images);

            foreach ($product->images as $image) {
                // dd($image->path);
                if (File::exists($image->path)) {
                    File::delete($image->path);
                }
            }
            $product->images()->delete();

            foreach ($request->file('images') as $image) {
                $path = $image->public_path('media/images'); // Sesuaikan path sesuai kebutuhan
                // dd($path);
                $product->images()->create(['path' => $path]);
            }
        }



        return redirect()->route('indexProduct')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //

        $product->delete();

        return redirect()->route('indexProduct')->with('success', 'Product deleted successfully');
    }

    public function single(Product $product)
    {
        // dd($product->name);
        return view('toyspace.page.single_product', compact('product'));
    }

    public function shopCart()
    {
        $carts = Cart::with(['product'])->where('user_id', Auth::user()->id)->get();
        return view('toyspace.page.shop_cart', compact('carts'));
    }

    public function checkout()
    {
        return view('toyspace.page.checkout');
    }
}
