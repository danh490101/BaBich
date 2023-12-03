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
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

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
        $discount = $this->checkDiscount($product->id);
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

        $comments = Feedback::where('product_id', $product->id)->where('status', '=', 0)->get()->toArray();

        $comments = array_map(function ($comment) {
            $user = User::findOrFail($comment['user_id']);
            $comment['user'] = $user;
            return $comment;
        }, $comments);
        $category_id = $product->category()->first()->id;
        $pdcate = Product::where('category_id', $category_id)
            ->where('id', '<>', $product->id)
            ->get();



        if ($discount != 0) {
            return view('user.product-details', compact('product', 'comments', 'avgRating', 'categories', 'skins', 'brands', 'pdcate', 'discount'));
        }
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

    public function checkDiscount($productId)
    {
        //set discount with id products
        //get all with status = 1, noted dung where
        $discounts = \App\Models\Discount::where('status', '=', '1')->get()->toArray();
        $productDiscounts = [];
        $product = Product::find(['id' => $productId])->first();
        foreach ($discounts as $item) {
            foreach (json_decode($item['product_ids']) as $id) {
                if ($productId == $id) {
                    return $product->price - $product->price * $item['value'] / 100;
                }
            }
        }

        return 0;
    }

    public function updateWishList()
    {
        $user = Auth::user();
        $favorites = Favorite::where('user_id', '=', $user->id)->get('product_id');

         $ids = array_map(function($item) {
            return $item['product_id'];
        }, $favorites->toArray());

        session([
            'wishList' => $ids
        ]);

        return true;
    }
}
