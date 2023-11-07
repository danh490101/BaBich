<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Feedback;
use App\Models\Product;
use App\Models\Skin;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        //

    }
    public function getDetails($id)
    {
        $categories = Category::all();
        $comments = Product::where('id', $id)->get();
        return view('product', ['id' => $id['id']], compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     */
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
        $comments = Feedback::where('product_id', $product->id)->get()->toArray();
        // dd($comments);
        $comments = array_map(function ($comment) {
            $user = User::findOrFail($comment['user_id']);
            $comment['user'] = $user;
            return $comment;
        }, $comments);
        $pdcate = Product::where('category_id', $product->category()->first()->id)->get();
        return view('user.product-details', compact('product', 'comments', 'avgRating', 'categories', 'skins', 'brands', 'pdcate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     */
    public function tinhTrungBinh(Product $product)
    {
        //laay tat ca cac rating cua comment tren 1 san pham
        $rating = Feedback::all()->with('rating');
    }
}
