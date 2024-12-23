<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
//        $this->middleware(\App\Http\Middleware\AdminMiddleware::class);
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.products.add_product', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sanitizedProductName = preg_replace('/[^A-Za-z0-9\-]/', '', $request['product_name']);

        $filename = time() . '_' . $sanitizedProductName . '.' . $request->file('image_upload')->getClientOriginalExtension();

        $path = $request->file('image_upload')->storeAs('images', $filename, 'public');

        Product::create([
            'product_name' => $request['product_name'],
            'price' => $request['price'],
            'details' => $request['details'],
            'image_link' => $path,
            'category_id' => $request['category']
        ]);
        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.view_product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('admin.products.edit_product', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $sanitizedProductName = preg_replace('/[^A-Za-z0-9\-]/', '', $request['product_name']);

        $filename = time() . '_' . $sanitizedProductName . '.' . $request->file('image_upload')->getClientOriginalExtension();

        $path = $request->file('image_upload')->storeAs('images', $filename, 'public');

        $product->product_name = $request['product_name'];
        $product->details = $request['details'];
        $product->price = $request['price'];
        $product->image_link = $path;
        $product->category_id = $request['category'];
        $product->save();
        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
