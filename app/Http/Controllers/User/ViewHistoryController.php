<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Skin;
use Illuminate\Support\Facades\Session;

class ViewHistoryController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $skins = Skin::all();

        $history = Session::get('user_history') ?? [];
        $products = Product::whereIn('id', $history)
            ->paginate(10);

        return view('user.view-histories', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'skins' => $skins,
        ]);
    }
}
