<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function addToCart(Request $request, $id)
    {
        $data = $request->validate([
            'quantity'=>'required|numeric|min:1'
        ]);

        $product = Product::findOrFail($id);

        if (!$product) {
            return redirect()->back();
        }


        if($data['quantity'] > $product->quantity) {
            toastr()->warning('Số lượng hàng trong kho không đủ!');
            return redirect()->back();
        }

        $cart = session()->get('cart', []);
        $cart['totalAmount'] = $cart['totalAmount'] ?? 0;
        if (isset($cart[$id])) {
            if($data['quantity'] > 1) {
                $cart[$id]['quantity'] = $cart[$id]['quantity'] + $data['quantity'];
            } 
            else {
            $cart[$id]['quantity']++;
            }
        } else {
            $cart[$id] = [
                "id" => $id,
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => $data['quantity'],
                "image" => $product->image
            ];
        }
        // $cart['totalAmount'] += 1;
        $cart['totalAmount'] += $data['quantity'];
        session()->put('cart', $cart);
        toastr()->success('Thêm vào giỏ hàng thành công');
        return redirect()->back();
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        $categoryId = $request->get('categoryId', null);
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', 1000);

        if (is_null($categoryId)) {
            $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();
        } else {
            $products = $this->getProductById($categoryId, [$minPrice, $maxPrice]);
        }
        

        return view('user.shop', compact('products', 'categories'));
    }

    public function cart(Request $request)
    {
        $categories = Category::all();
        $cart = $request->session()->get('cart');
        $totalPrice = 0;
        foreach ($cart as $id => $item) {
            if ($id == 'totalAmount') continue;
            $totalPrice += $item['price'] * $item['quantity'];
        }
        $cart['totalPrice'] = $totalPrice;
        return view('user.cart', compact('cart', 'categories'));
    }



    public function addToFavorites($productId)
    {
        $user = Auth::user(); // Lấy người dùng 
        $product = Product::find($productId); // Lấy sản phẩm bạn muốn thêm 
        // dd($product);
        if (!$product) {
            // 
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm.');
        }

        // Kiểm tra xem sản phẩm đã được thêm vào danh sách yêu thích 
        if (!$user->favoriteProducts->contains($product)) {
            $user->favoriteProducts()->attach($product);
            return redirect()->back()->with('success', 'Đã thêm sản phẩm vào danh sách yêu thích.');
        } else {
            return redirect()->back()->with('info', 'Sản phẩm đã có trong danh sách yêu thích.');
        }
    }

    public function favorites()
    {
        $user = Auth::user();
        $favorites = Favorite::where('user_id', '=', $user->id)->get();
        $products = [];
        foreach ($favorites as $item) {
            $products[] = Product::find($item->product_id);
        }
        $categories = Category::all();
        return view('user.favorite', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            $totalAmount = 0;

            foreach ($cart as $key => $item) {
                if ($key === 'totalAmount') {
                    continue;
                }

                $totalAmount = $totalAmount + ($item['quantity'] ?? 0);
            }

            $cart['totalAmount'] = $totalAmount;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');

            return true;
        }

        return false;
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function getProductById($categoryId, $filter)
    {
        $products = Product::where('category_id', '=', $categoryId)->where(function($query) use ($filter){
            $query->whereBetween('price', $filter);
        })->get();

        return $products;
    }
}
