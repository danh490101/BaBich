<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDetailsController extends Controller
{
    public function getSearchOrderDetail(Request $request)
    {
        $searchTerm = $request->get('text');
        // dd($searchTerm);
        $result = Order::where('id', 'like', "%$searchTerm%")
            ->first();
        // dd($results);
        return view('admin.order_details.search', ['result' => $result]);
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $order_details = OrderDetails::all();
        $orders = Order::where('status', '=', 1)->paginate(20);
        return view('admin.order_details.index', compact('order_details', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
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
     * @param  \App\Models\OrderDetails  $orderDetails
     */
    public function show(OrderDetails $orderDetails)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetails  $orderDetails
     */
    public function edit($id)
    {
        //
        // dd($id);
        $orderDetail = Order::findOrFail($id);
        // dd($orderDetail);
        // dd($order);
        $orderDetails = DB::table('order_details')
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->join('orders', 'orders.id', '=', 'order_details.order_id')
        ->select('products.*', 'products.name as product_name', 'order_details.*', 'orders.*')
        ->get();
        // dd($order);
        // dd($orderDetail, $orderDetails);
        // $order = Order::with('users', 'products')->find($order->id);
        return view('admin.order_details.edit', compact('orderDetail', 'orderDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetails  $orderDetails
     */
    public function update(Request $request, OrderDetails $orderDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetails  $orderDetails
     */
    public function destroy(OrderDetails $orderDetails)
    {
        //
    }
}
