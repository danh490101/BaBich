<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Skin;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearch(Request $request)
{
    $skins = Skin::all();
    $brands = Brand::all();
    $categories = Category::all();
    $searchTerm = $request->get('keyword'); // Lấy từ request

    $results = Product::where(function ($query) use ($searchTerm) {
            $query->where('name', 'like', "%$searchTerm%")
                ->orWhere('price', '=', $searchTerm)
                ->orWhereHas('brand', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', "%$searchTerm%");
                })
                ->orWhereHas('category', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', "%$searchTerm%");
                })
                ->orWhereHas('skin', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', "%$searchTerm%");
                });
        })
        ->where('quantity', '>', 0)
        ->get();

        session()->put('results', $results);
        session()->put('keyword', $searchTerm);

        return redirect()->route('user.search-view');
    // return view('user.home.search', ['results' => $results], compact('categories', 'brands', 'skins'));
}

public function searchView(Request $request) {
    $skins = Skin::all();
    $brands = Brand::all();
    $categories = Category::all();
    $results = session('results') ?? [];
    $keyword = session('keyword') ?? '';

    return view('user.home.search', ['results' => $results, 'keyword' => $keyword], compact('categories', 'brands', 'skins'));
}

}
