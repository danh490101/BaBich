<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Product;
use App\Models\Skin;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $productList = $this->getDiscount();
        $data = $request->validate([
            'quantity' => 'required|numeric|min:1'
        ]);

        $product = Product::findOrFail($id);

        if (!$product) {
            return redirect()->back();
        }


        if ($data['quantity'] > $product->quantity) {
            return redirect()->back()->with('warning', 'Số lượng trong kho không đủ');
        }
        

        $cart = session()->get('cart', []);
        $cart['totalAmount'] = $cart['totalAmount'] ?? 0;
        if (isset($cart[$id])) {
            if ($data['quantity'] > 1) {
                $cart[$id]['quantity'] = $cart[$id]['quantity'] + $data['quantity'];
            } else {
                $cart[$id]['quantity']++;
            }
        } else {
            $cart[$id] = [
                "id" => $id,
                "name" => $product->name,
                "price" => isset($productList[$product->id]) ? $productList[$product->id]['value'] : $product->price,
                "quantity" => $data['quantity'],
                "image" => $product->image
            ];
        }
        // $cart['totalAmount'] += 1;
        $cart['totalAmount'] += $data['quantity'];
        session()->put('cart', $cart);
        session()->flash('success', 'Thêm vào giỏ hàng thành công');
        return redirect()->back();
    }

    public function addToCartGet(Request $request, $id)
    {
        $productList = $this->getDiscount();
        $data['quantity'] = 1;

        $product = Product::findOrFail($id);

        if (!$product) {
            return redirect()->back();
        }


        if ($data['quantity'] > $product->quantity) {
            toastr()->info('Số lượng hàng trong kho không đủ!');
            return redirect()->back();
        }

        $cart = session()->get('cart', []);
        $cart['totalAmount'] = $cart['totalAmount'] ?? 0;
        if (isset($cart[$id])) {
            if ($data['quantity'] > 1) {
                $cart[$id]['quantity'] = $cart[$id]['quantity'] + $data['quantity'];
            } else {
                $cart[$id]['quantity']++;
            }
        } else {
            $cart[$id] = [
                "id" => $id,
                "name" => $product->name,
                "price" => isset($productList[$product->id]) ? $productList[$product->id]['value'] : $product->price,
                "quantity" => $data['quantity'],
                "image" => $product->image
            ];
        }
        $cart['totalAmount'] += $data['quantity'];
        session()->put('cart', $cart);
        session()->flash('success', 'Thêm vào giỏ hàng thành công');
        return redirect()->back();
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $skins = Skin::all();
        $categoryId = $request->get('categoryId', null);
        $brandId = $request->get('brandId', null);
        $skinId = $request->get('skinId', null);
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', 1000000);
        if (is_null($categoryId) && is_null($brandId) && is_null($skinId)) {
            $products = Product::whereBetween('price', [$minPrice, $maxPrice])->where('quantity', '>', '0')->paginate(12);
        } else {
            $products = $this->getProductByCondition([
                'categoryId' => $categoryId,
                'brandId' => $brandId,
                'skinId' => $skinId,
            ], [$minPrice, $maxPrice]);
        }
        return view('user.shop', compact('products', 'categories', 'brands', 'skins'));
    }

    public function cart(Request $request)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $skins = Skin::all();
        $cart = $request->session()->get('cart') ?? [];
        $totalPrice = 0;
        foreach ($cart as $id => $item) {
            if ($id == 'totalAmount') {
                continue;
            }
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $cart['totalPrice'] = $totalPrice;
        return view('user.cart', compact('cart', 'categories', 'skins', 'brands'));
    }
    public function addToFavorites($productId)
    {
        $user = User::where('id', Auth::id())->firstOrFail(); // Lấy người dùng
        $product = Product::find($productId); // Lấy sản phẩm bạn muốn thêm
        if (!$product) {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm.');
        }
        if ($user->favoriteProducts->contains($product)) {
            $user->favoriteProducts()->detach($product);
            return redirect()->back()->with('success', 'Sản phẩm đã xóa trong danh sách yêu thích.');
        }
        try {
            DB::beginTransaction();
            $user->favoriteProducts()->attach($product);

            DB::commit();
            return redirect()->back()->with('success', 'Đã thêm sản phẩm vào danh sách yêu thích.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm sản phẩm vào danh sách yêu thích.');
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

        $ids = array_map(function($item) {
            return $item['product_id'];
        }, $favorites->toArray());

        session([
            'wishList' => $ids
        ]);
        
        $categories = Category::all();
        $brands = Brand::all();
        $skins = Skin::all();

        return view('user.favorite', compact('products', 'categories', 'skins', 'brands'));
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
            session()->flash('success', 'Cập nhật giỏ hàng thành công!');

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
                $totalAmount = 0;

                foreach ($cart as $key => $item) {
                    if ($key === 'totalAmount') {
                        continue;
                    }

                    $totalAmount = $totalAmount + ($item['quantity'] ?? 0);
                }

                $cart['totalAmount'] = $totalAmount;

                session()->put('cart', $cart);
            }
            session()->flash('success', 'Đã xóa sản phẩm ra khỏi giỏ hàng!');
        }
    }

    // public function getProductByCondition($condition, $filter)
    // {
    //     if (isset($condition['categoryId']) && isset($condition['brandId']) && isset($condition['skinId'])) {
    //         $products = Product::where('category_id', '=', $condition['categoryId'])
    //             ->where('brand_id', '=', $condition['brandId'])
    //             ->where('skin_id', '=', $condition['skinId'])
    //             ->where(function ($query) use ($filter) {
    //                 $query->whereBetween('price', $filter);
    //             })->get();
    //     }   elseif (isset($condition['brandId'])) {
    //         $products = Product::where('brand_id', '=', $condition['brandId'])
    //             ->where(function ($query) use ($filter) {
    //                 $query->whereBetween('price', $filter);
    //             })->get();
    //     }   elseif (isset($condition['categoryId'])) {
    //         $products = Product::where('category_id', '=', $condition['categoryId'])
    //             ->where(function ($query) use ($filter) {
    //                 $query->whereBetween('price', $filter);
    //             })->get();
    //     }   elseif (isset($condition['skinId'])) {
    //         $products = Product::where('skin_id', '=', $condition['skinId'])
    //             ->where(function ($query) use ($filter) {
    //                 $query->whereBetween('price', $filter);
    //             })->get();
    //      }  else {
    //         $products = Product::where(function ($query) use ($filter) {
    //             $query->whereBetween('price', $filter);
    //         })->get();
    //     }

    //     return $products;
    // }

    public function getProductByCondition($condition, $filter)
    {
        $products = Product::where('quantity', '>', 0)->where(function ($query) use ($filter) {
            $query->whereBetween('price', $filter);
        });
        if(isset($condition['skinId'])) {
            $products = $products->where('skin_id', '=', $condition['skinId']);
        }
        if(isset($condition['brandId'])) {
            $products = $products->where('brand_id', '=', $condition['brandId']);
        }
        if(isset($condition['categoryId'])) {
            $products = $products->where('category_id', '=', $condition['categoryId']);
        }
        return $products->paginate(12);
    }
    public function getDiscount()
    {
        //set discount with id products
        $discounts = \App\Models\Discount::all()->toArray();
        $productDiscounts = [];
        foreach ($discounts as $item) {
            foreach (json_decode($item['product_ids']) as $productId) {
                $productDiscounts[$productId] = $item['value'];
            }
        }
        //get list discount
        $products = Product::all();
        $discountList = [];
        foreach ($products as $product) {
            if (isset($productDiscounts[$product->id])) {
                $discountList[$product->id]['item'] =  $product;
                $discountList[$product->id]['value'] =  $product->price - $product->price * $productDiscounts[$product->id] / 100;
            }
        }

        return $discountList;
    }
}
