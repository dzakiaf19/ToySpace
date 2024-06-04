<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;


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

        $categories = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        $topProducts = Product::withSum('order_details', 'qty')
            ->orderBy('order_details_sum_qty', 'desc')
            ->take(3)
            ->get();

        return view('toyspace.index', compact('product', 'categories', 'topProducts'));
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
            'berat' => $request->input('berat'),
            'desc' => $request->input('desc'),
            'category_id' => $request->input('category_id'),
        ]);

        toast('Your Post as been submited!', 'success');

        return redirect()->route('product.index');
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
        $product->update([
            'name' => $request->input('name'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
            'desc' => $request->input('desc'),
            'cat_id' => $request->input('category_id'),
        ]);

        toast('Your Post as been submited!', 'success');

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //

        $product->delete();

        return redirect()->route('product.index');
    }

    public function single(Product $product)
    {
        // dd($product->name);
        $categories = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        return view('toyspace.page.single_product', compact('product', 'categories'));
    }

    public function pageProducts()
    {
        $products = Product::query();

        if (!empty(request('search'))) {
            $products->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('desc', 'like', '%' . request('search') . '%')
            ->paginate(12);
        }
        if (!empty(request('category'))) {
            $products->where('category_id', request('category'));
        }

        $product = $products->paginate(12);

        $categories = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        return view('toyspace.page.products', compact('categories', 'product'));
    }
}
