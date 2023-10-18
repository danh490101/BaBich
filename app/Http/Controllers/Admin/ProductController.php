<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    CONST PREFIX_IMAGE_URL = 'public/storage/image/products';
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'),['products' => $products]);

    }

    /**
     * Create new product
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.add', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->validate([
            'name' => 'required|string|unique:products',
            'desc' => 'required|string',
            'price' => 'required|string',
            'quantity' => 'required|string',
            'fileUpload' => 'required|image',
            'fileUpload1' => 'required|image',
            'fileUpload2' => 'required|image',
            'brand_id' => 'numeric|required|min:1',
            'category_id' => 'numeric|required|min:1'
        ]);
        $imageUrl = substr($request->file('fileUpload')->store(self::PREFIX_IMAGE_URL), strlen('public/'));
        $product['image'] = $imageUrl;

        $imageUrl1 = substr($request->file('fileUpload1')->store(self::PREFIX_IMAGE_URL), strlen('public/'));
        $product['images'] = $imageUrl1;

        $imageUrl2 = substr($request->file('fileUpload2')->store(self::PREFIX_IMAGE_URL), strlen('public/'));
        $product['image2'] = $imageUrl2;
        //dd($product);

        $product = Product::create($product);
       return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     */
    public function edit(Product $product)
    {
        //
        $product = Product::findOrFail($product->id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product = Product::findOrFail($product->id);
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
