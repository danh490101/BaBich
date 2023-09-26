<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    //
    public function getSearch(Request $request)
{
    $result = $request -> result;
    dd($result);
    // $keyword = $request->name;
    // $keyword1 = $request->name;
    // $keyword2 = $request->name;
    // $results = DB::table('products')
    //     ->join('categories', 'products.category_id', '=', 'categories.id')
    //     ->join('brand', 'products.brand_id', '=', 'brand.id')
    //     ->select('products.id as product_id', 'products.name as product_name', 'categories.id as category_id', 'categories.name as category_name', 'brand.id as brand_id', 'brand.name as brand_name')
    //     ->where('products.name', 'like', '%' . $keyword . '%')
    //     ->orWhere('categories.name', 'like', '%' . $keyword1 . '%')
    //     ->orWhere('brand.name', 'like', '%' . $keyword2 . '%')
    //     ->get();
    //     return view('livewire.search')->with('getSearch',$results);
}

    // public function getSearch(Request $request)
    // {
    //     $result = $request->result;
    //     $data['keyword'] = $result;
    //     $result = str_replace(' ', '%', $result);
    //      //= Product::where('name', 'like', '%' . $result . '%')->orWhere('pro_name', 'like', '%' . $result . '%')->get();
    //     $data['items']= DB::table('products')
    //         ->join('categories', 'products.category_id', '=', 'categories.id')
    //         ->join('brand', 'products.brand_id', '=', 'brand.id')
    //         ->select('products.*', 'categories.name', 'brand.name')
    //         ->get();

        
    //     return view('livewire.search', $data);

        // // $sohieu = $request->sohieu;
        // // if ($sohieu) {
        //     $keywords1 = $request->name;
        //     $keywords2 = $request->category_id;
        //     $keywords2 = $request->brand_id;
        //     $datas = DB::table('products')
        //         ->join('categories', 'products.category_id', '=', 'categories.id')
        //         ->join('brand', 'products.brand_id', '=', 'brand.id')
        //         ->where('name', '=', $keywords1)
        //         ->where('category_id', 'like', '%' . $keywords2 . '%')
        //         ->where('brand_id', 'like', '%' . $keywords2 . '%')
        //         ->get();
        //     return view('livewire.search')->with('getSearch', $datas);
        
  //  }
}
