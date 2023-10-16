<?php

namespace App\Http\Controllers\User;

use App\Events\SendMailConfirmEvent;
use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $cart = $request->session()->get('cart');
        $totalPrice = 0;
        foreach ($cart as $id => $item) {
            if ($id == 'totalAmount') continue;
            $totalPrice += $item['price'] * $item['quantity'];
        }
        $cart['totalPrice'] = $totalPrice;
        unset($cart['totalAmount']);
        $user_id = $request->user()->id;
        $user = User::findOrFail($user_id);
        return view('user.checkout', compact('cart', 'user','categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    public function thanks(){
        $categories = Category::all();
        return view('user.thanks',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
       // dd($request->session()->get('cart'));
        $data = $request->all();
        $dataUpdate = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'totalamount' => 'required',
            'delivery_cost' => 'required',
            'payment_method' => ' required|numeric|min:1|max:2'
        ]);
        $dataUpdate['order_date'] = Carbon::now()->format('Y-m-d');
        $dataUpdate['user_id'] = $request->user()->id;
        $order = Order::create($dataUpdate);
        $this->processOrderDetais($request, $order->id);

        SendMailConfirmEvent::dispatch(
            $order
        );
        
       // return view('user.thanks');
        return redirect()->route('index');
        //dd($dataUpdate);
       // $cart = $request->session()->get('cart');
        // dd($cart);
        //dd($checkout);
    }
    public function processOrderDetais(Request $request, $orderId){
        $cart = $request ->session()->get('cart');
        $order_details = [];
        foreach ($cart as $item) {
            if (!is_array($item)) continue;
            $order_details[] = [
                'order_id' => $orderId,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'quantity'=>$item['quantity'],
                'totalamount'=> $item['price']*$item['quantity'],
            ];
        }
        $order_details = OrderDetails::insert($order_details);
        session()->put('cart',[]);
        //dd($order_details);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
