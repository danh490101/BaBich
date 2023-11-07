<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Feedback;
use App\Models\Product;
use App\Models\Skin;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class ProductDetailsController extends Controller
{
    public function getDetails($id)
    {
        $categories = Category::all();
        $comments = Product::where('id', $id)->get();
        return view('product', ['id' => $id['id']], compact('categories'));
    }

    public function show(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $skins = Skin::all();
        $ratings = Feedback::where('product_id', $product->id)->get('rating')->toArray();
        $ratingValue = array_map(function ($rating) {
            $rating = $rating['rating'];
            return $rating;
        }, $ratings);
        $avgRating = Collection::make($ratingValue)->avg();

        $product = Product::findOrFail($product->id);
        $this->pushToViewHistory($product->id);

        $comments = Feedback::where('product_id', $product->id)->get()->toArray();

        $comments = array_map(function ($comment) {
            $user = User::findOrFail($comment['user_id']);
            $comment['user'] = $user;
            return $comment;
        }, $comments);
        $pdcate = Product::where('category_id', $product->category()->first()->id)->get();
        return view('user.product-details', compact('product', 'comments', 'avgRating', 'categories', 'skins', 'brands', 'pdcate'));
    }

    public function tinhTrungBinh()
    {
        //laay tat ca cac rating cua comment tren 1 san pham
        $rating = Feedback::all()->with('rating');
    }

    public function pushToViewHistory(string|int $id)
    {
        $product = Product::findOrFail($id);
        $userViewHistories = Session::get('user_history', []);

        if (!in_array($product->id, $userViewHistories)) {
            array_unshift($userViewHistories, $product->id);
            Session::put('user_history', $userViewHistories);
        }
    }
}
