<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearch(Request $request)
    {
        //  $result = $request->result;
        //dd($request->get('keyword'));
        $categories = Category::all();
        $searchTerm = $request->get('keyword'); // Lấy từ request
       // dd($searchTerm);
        $results = Product::where('name', 'like', "%$searchTerm%")
            ->orWhereHas('brand', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%");
            })
            ->orWhereHas('category', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%");
            })
            ->get();
           // dd($results);
            return view('user.home.search', ['results' => $results], compact('categories'));

    }


}
