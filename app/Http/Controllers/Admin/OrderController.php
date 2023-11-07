<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $users = User::all();
        $orders = Order::all(); // Phân trang với mỗi trang hiển thị 20 dòng
        return view('admin.orders.index', compact('orders'), ['orders' => $orders]);
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
        // Kiểm tra và xác thực dữ liệu từ yêu cầu
        // $data = $request->validate([
        //     'delivery_date' => 'required',
        // ]);

        // // Tạo một bản ghi mới trong cơ sở dữ liệu với status mặc định là 0
        // $order = Order::create(array_merge($data, ['status' => 0]));

        // // Cập nhật trạng thái (status) thành 1
        // $order->update(['status' => 1]);

        // // Chuyển hướng người dùng đến trang danh sách đơn đặt hàng sau khi tạo thành công
        // return redirect()->route('admin.orders.index');
    }
    public function getSearchOrder(Request $request)
    {
        // dd(123);
        //dd($request->all());
        //  $result = $request->result;
        //dd($request->get('keyword'));
        $searchTerm = $request->get('text'); // Lấy từ request
        // dd($searchTerm);
        $results = Order::where('id', 'like', "%$searchTerm%")
            ->get();
        // dd($results);
        return view('admin.orders.search', ['results' => $results]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     */
    public function edit(Order $order)
    {
        //
        $orders = Order::findOrFail($order->id);
        // dd($order);
        $order = DB::table('order_details')
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->join('orders', 'orders.id', '=', 'order_details.order_id')
        ->select('products.*', 'products.name as product_name', 'order_details.*', 'orders.*')
        ->get();
        // dd($order);
        // $order = Order::with('users', 'products')->find($order->id);
        return view('admin.orders.edit', compact('order', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     */
    public function update(Request $request, Order $order)
    {
        // Tìm bản ghi Order dựa trên ID
        $order = Order::findOrFail($order->id);

        // Kiểm tra và xác thực dữ liệu từ yêu cầu
        $orderUpdate = $request->validate([
            'delivery_date' => [
                'required',
            ],
        ]);

        // Cập nhật thông tin của bản ghi Order với dữ liệu được xác thực
        $order->update($orderUpdate);

        // Cập nhật cột 'status' từ 0 thành 1
        $order->update(['status' => 1]);

        // Chuyển hướng người dùng đến trang danh sách đơn đặt hàng sau khi cập nhật thành công
        return redirect()->route('admin.orders.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     */
    public function destroy(Order $order)
    {
        //
    }
}
