<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    public const PREFIX_IMAGE_URL = 'public/storage/img/brands/';
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.brands.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $brand = $request->validate([
            'name' => 'required|string|min:1|max:30|unique:brands',
            'fileUpload' => 'required|image'

        ]);
        if ($request->file('fileUpload')) {
            $imageUrl = substr($request->file('fileUpload')->store(self::PREFIX_IMAGE_URL), strlen('public/'));
            $brand['image'] = $imageUrl;
        }


        $brand = Brand::create($brand);
        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     */
    public function edit(Brand $brand)
    {
        //
        $brand = Brand::findOrFail($brand->id);
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
        $brand = Brand::findOrFail($brand->id);
        $brandUpdate = $request->validate([
            'name' => [
                'required',
                Rule::unique('brands')->ignore($brand->id),
            ],
            'fileUpload' => [
                'nullable',
                'image'
            ]

        ]);

        if ($request->file('fileUpload')) {
            $imageUrl = substr($request->file('fileUpload')->store(self::PREFIX_IMAGE_URL), strlen('public/'));
            $brand['image'] = $imageUrl;
        }
        $brand->update($brandUpdate);
        session()->flash('success', 'Cập nhật thành công!');

        return redirect()->route('admin.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand = Brand::findOrFail($brand->id);
        $brand->delete();
        session()->flash('success', 'Xóa thành công!');
        return redirect()->route('admin.brands.index');
    }
}
