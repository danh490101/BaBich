<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
            // Người dùng đã đăng nhập

            $products = $this->groupProductByCategory();
            $brands = Brand::all();
            $categories = Category::all();
            $suggestion = $this->getProductSuggestion($request);
            return view('user.home.index', compact('categories', 'brands', 'products', 'suggestion'));
        } else {
            $products = $this->groupProductByCategory();
            $brands = Brand::all();
            $categories = Category::all();
            return view('user.home.index', compact('categories', 'brands', 'products'));
        }
    }

    public function contact()
    {
        return view('user.about');
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
        $products = Product::all();

        $productList = [];
        foreach ($products as $product) {
            if (!isset($productList[$product->category_id])) {
                $productList[$product->category_id][] = $product;
            }
        }

        return $productList;
    }
}
