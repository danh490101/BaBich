<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function addToCart($id){
        $product = Product:: findOrFail($id);
        if (!$product) {
            return redirect()->back();
        }

        $cart = session()->get('cart',[]);
        $cart['totalAmount'] = $cart['totalAmount'] ?? 0;
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        } else {
            $cart[$id]=[
                "id" => $id,
                "name" => $product->name,
                "price" =>$product->price,
                "quantity"=>1,
                "image"=>$product->image
            ];
        }
        $cart['totalAmount'] += 1;
        session()->put('cart', $cart);
        return redirect()->back();
    }
    public function index()
    { 
        $categories = Category::all();
        $products = Product::all();
        return view('user.shop', compact('products','categories'));
    }
    public function cart(Request $request)
    {
        $cart = $request->session()->get('cart');
        $totalPrice = 0;
        foreach ($cart as $id => $item) {
            if($id == 'totalAmount') continue;
            $totalPrice += $item['price'] * $item['quantity'];
        }
        $cart['totalPrice'] = $totalPrice;
        return view('user.cart', compact('cart'));
    }
    


    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     */
    public function update(Request $request)
    {
        //
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     */
    public function destroy(Product $product)
    {
        //
    }
    
}
