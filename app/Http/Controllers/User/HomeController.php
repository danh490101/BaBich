<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Skin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check() && Auth::user()->utype =='ADM'){
            return view('admin.dashboard');
        }
        $discountList = $this->getDiscount();
        $brands = Brand::all();
        $skins = Skin ::all();
        $categories = Category::all();
        $products = $this->groupProductByCategory();
        $bproducts = $this->groupProductByBrand();
        $sproducts = $this->groupProductBySkin();
        $mappingCates = Category::all()->pluck("name","id")->toArray();
        if (Auth::check()) {
            $suggestion = $this->getProductSuggestion($request);
            return view('user.home.index', compact('categories', 'brands', 'products', 'suggestion','skins', 'discountList', 'mappingCates'));
        } else {
            return view('user.home.index', compact('categories', 'brands', 'products','skins', 'discountList', 'mappingCates'));
        } 
    }

    public function contact()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $skins = Skin::all();
        return view('user.about', compact('categories', 'brands', 'skins')) ;
    }

    //Product suggestion
    public function getProductSuggestion(Request $request)
    {
        $userId = $request->user()->id;
        $items = $this->getOrderDetailsByUser($userId);

        $productItems = [];
        foreach ($items as $item) {
            if (!isset($productItems[$item->product_id])) {
                $productItems[$item->product_id]['total'] = 1;
                $productItems[$item->product_id]['item'] = Product::findOrFail($item->product_id);
                continue;
            }
            $productItems[$item->product_id]['total'] += 1;
        }

        rsort($productItems);

        $suggestion = array_map(function ($item) {
            return $item['item'];
        }, $productItems);

        return $suggestion;
    }

    public function getOrderDetailsByUser($userId)
    {
        $orders = Order::where('user_id', '=', $userId)->get();
        $orderDetails = [];
        foreach ($orders as $order) {
            $details = OrderDetails::where('order_id', '=', $order->id)->get();
            foreach ($details as $detail) {
                $orderDetails[] = $detail;
            }
        }

        return $orderDetails;
    }

    public function groupProductByCategory()
    {
        $products = Product::where('quantity','>', 0)->get();
        $productList = [];
        foreach ($products as $product) {
            // if($product->quantity > 0)
            $productList[$product->category_id][] = $product;
        }
        return $productList;
    }
    public function showByCategory($categoryId)
    {
        $products = Product::where('category_id', $categoryId)->get();
        return view('products.by_category', ['products' => $products]);
    }

    //     public function showProductsByCategory($categoryId)
    // {
    //     $productList = $this->groupProductByCategory(); // Gọi hàm để nhóm sản phẩm theo loại

    //     return view('user.shop', [
    //         'categoryId' => $categoryId,
    //         'products' => $productList[$categoryId]
    //     ]);
    // }

    public function groupProductByBrand()
    {
        $products = Product::where('quantity','>', 0)->get();;

        $productList1 = [];
        foreach ($products as $product) {
            $productList1[$product->brand_id][] = $product;
        }
        return $productList1;
    }

    public function showByBrand($brandId)
    {
        $products = Product::where('brand_id', $brandId)->get();
        return view('products.by_brand', ['products' => $products]);
    }

    public function groupProductBySkin()
    {
        $products = Product::all();

        $productList2 = [];
        foreach ($products as $product) {
            $productList2[$product->skin_id][] = $product;
        }
        return $productList2;
    }

    public function showBySkin($skinId)
    {
        $products = Product::where('skin_id', $skinId)->get();
        return view('products.by_skin', ['products' => $products]);
    }

    public function getDiscount()
    {
        //set discount with id products
        //get all with status = 1, noted dung where
        $discounts = \App\Models\Discount::all()->toArray();
        $productDiscounts = [];
        foreach ($discounts as $item) {
            foreach (json_decode($item['product_ids']) as $productId) {
                $productDiscounts[$productId] = $item['value'];
            }
        }

        //get list discount
        $products = Product::where('quantity','>', 0)->get();
        $discountList = [];
        foreach ($products as $product) {
            if (isset($productDiscounts[$product->id])) {
                $discountList[$product->id]['item'] =  $product;
                $discountList[$product->id]['value'] =  $product->price - $product->price*$productDiscounts[$product->id]/100;
            }
        }

        return $discountList;
    }
}
