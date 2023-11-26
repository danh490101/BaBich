<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Skin;
use App\Models\User;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // app/Http/Controllers/OrderHistoryController.php

    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $skins = Skin::all();
        $customer = User::findOrFail(\Illuminate\Support\Facades\Auth::user()->id);
        $orders = $customer->orders; // Lấy danh sách đơn hàng của khách hàng

        return view('user.order-history', compact('customer', 'orders', 'brands', 'skins', 'categories'));
    }


    public function findOrderStatus($status)
    {
        // $order = Order::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $skins = Skin::all();
        $user_id = \Illuminate\Support\Facades\Auth::id();
        $orders = Order::where('user_id', $user_id)->where('status', $status)->get();

        return view('user.order-history', compact('user_id', 'orders', 'brands', 'skins', 'categories', 'status'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $orderDetails = OrderDetails::where('order_id', $id)->get();
        foreach ($orderDetails as $detail) {
            $product = Product::findOrFail($detail->product_id);
            $product->update([
                'quantity' => $product->quantity + $detail->quantity,
            ]);
        }
        $order->details()->delete(); 
        $order->delete();
        session()->flash('success', 'Xóa thành công!');
        return redirect()->back();
    }

}
