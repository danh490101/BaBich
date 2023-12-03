<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Skin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public const PREFIX_IMAGE_URL = 'public/image/products';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(20);
        return view('admin.products.index', compact('products'), ['products' => $products]);
    }

    /**
     * Create new product
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $skins = Skin::all();
        return view('admin.products.add', compact('brands', 'categories', 'skins'));
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
            'price' => 'required',
            'fileUpload' => 'required|image',
            'fileUpload1' => 'required|image',
            'fileUpload2' => 'required|image',
            'brand_id' => 'numeric|required|min:1',
            'category_id' => 'numeric|required|min:1',
            'skin_id' => 'numeric|required|min:1'
        ]);
        $imageUrl = $request->file('fileUpload')->store(self::PREFIX_IMAGE_URL);
        $imageUrl = Storage::url($imageUrl);
        $product['image'] = $imageUrl;

        $imageUrl1 = $request->file('fileUpload1')->store(self::PREFIX_IMAGE_URL);
        $imageUrl1 = Storage::url($imageUrl1);
        $product['images'] = $imageUrl1;

        $imageUrl2 = $request->file('fileUpload2')->store(self::PREFIX_IMAGE_URL);
        $imageUrl2 = Storage::url($imageUrl2);
        $product['image2'] = $imageUrl2;

        //dd($product);
        $product = Product::create($product);
        session()->flash('success', 'Thêm thành công!');
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
        $categories = Category::all();
        $brands = Brand::all();
        $skins = Skin::all();
        return view('admin.products.edit', compact('product', 'brands', 'categories', 'skins'));
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
        $product = Product::findOrFail($product->id);
        // dd($product);
        $productUpdate = $request->validate([
            'name' => [
                'nullable'
            ],
            'desc' => [
                'required'
            ],
            'brand_id' => [
                'required'
            ],
            'price' => [
                'required'
            ],
            'category_id' => [
                'required'
            ],
            'skin_id' => [
                'required'
            ],
            'fileUpload' => [
                'nullable',
                'image'
            ],
            'fileUpload1' => [
                'nullable',
                'image'
            ],

            'fileUpload2' => [
                'nullable',
                'image'
            ]
        ]);

        if ($request->file('fileUpload')) {
            $imageUrl = $request->file('fileUpload')->store(self::PREFIX_IMAGE_URL);
            $imageUrl = Storage::url($imageUrl);
            $product['image'] = $imageUrl;
        }
        if ($request->file('fileUpload1')) {
            $imageUrl1 = $request->file('fileUpload1')->store(self::PREFIX_IMAGE_URL);
            $imageUrl1 = Storage::url($imageUrl1);
            $product['images'] = $imageUrl1;
        }
        if ($request->file('fileUpload2')) {
            $imageUrl2 = $request->file('fileUpload2')->store(self::PREFIX_IMAGE_URL);
            $imageUrl2 = Storage::url($imageUrl2);
            $product['image2'] = $imageUrl2;
        }
        $product->update($productUpdate);

        session()->flash('success', 'Cập nhật thành công!');

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();
        session()->flash('success', 'Xóa thành công!');
        return redirect()->route('admin.products.index');
    }
}
