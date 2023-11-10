<?php

namespace App\Http\Controllers\User;

use App\Events\SendMailConfirmEvent;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Skin;
use App\Models\User;
use App\Models\Category;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $skins = Skin::all();
        $cart = $request->session()->get('cart');
        $totalPrice = 0;
        foreach ($cart as $id => $item) {
            if ($id == 'totalAmount') {
                continue;
            }
            $totalPrice += $item['price'] * $item['quantity'];
        }
        $cart['totalPrice'] = $totalPrice;
        unset($cart['totalAmount']);
        $user_id = $request->user()->id;
        $user = User::findOrFail($user_id);
        $provinces = Province::orderBy('name', 'asc')->get();
        return view('user.checkout', compact('cart', 'user', 'categories', 'skins', 'brands', 'provinces'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'totalamount' => 'required',
            'delivery_cost' => 'required',
            'ward_id' => 'required',
            'payment_method' => ' required|in:COD,VNPAY'
        ]);

        $order = Order::create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'totalamount' => (float) $validatedData['totalamount'],
            'delivery_cost' => (float) $validatedData['delivery_cost'],
            'payment_method' => $validatedData['payment_method'],
            'ward_id' => $validatedData['ward_id'],
            'user_id' => Auth::id(),
        ]);
        //get discount by code
        //=> lay tu bang discount theo cot code

        //update gia tong
        //=> tong = tong*discount->value/100

        // $this->processOrderDetais($request, $order->id);
        // SendMailConfirmEvent::dispatch(
        //     $order
        // );
        // return view('user.thanks');

        $this->processOrderDetais($request, $order->id);

        if ($validatedData['payment_method'] == 'VNPAY') {
            $vnpUrl = 'http://sandbox.vnpayment.vn/paymentv2/vpcpay.html';

            if (!App::environment('local')) {
                $vnpUrl = 'https://sandbox.vnpayment.vn/merchant_webapi/merchant.html';
            }

            $vnpReturnurl = env('APP_URL') . '/payments/vnpay/callback';
            $vnpTmnCode = config('services.vnpay.vnp_tmn_code');
            $vnpHashSecret = config('services.vnpay.vnp_hash_secret');
            $vnpTxnRef = $order['id'];
            $vnpOrderInfo = 'Thanh toan online';
            $vnpOrderType = 'billpayment';
            $vnpAmount = $order['totalamount'] * 100;
            $vnpLocale = config('app.locale');
            $vnpBankCode = 'NCB';
            $vnpIpAddr = request()->ip();

            $inputData = array(
                'vnp_Version' => '2.1.0',
                'vnp_TmnCode' => $vnpTmnCode,
                'vnp_Amount' => $vnpAmount,
                'vnp_Command' => 'pay',
                'vnp_CreateDate' => date('YmdHis'),
                'vnp_CurrCode' => 'VND',
                'vnp_IpAddr' => $vnpIpAddr,
                'vnp_Locale' => $vnpLocale,
                'vnp_OrderInfo' => $vnpOrderInfo,
                'vnp_OrderType' => $vnpOrderType,
                'vnp_ReturnUrl' => $vnpReturnurl,
                'vnp_TxnRef' => $vnpTxnRef,
            );

            if (isset($vnpBankCode) && $vnpBankCode != '') {
                $inputData['vnp_BankCode'] = $vnpBankCode;
            }

            if (isset($vnpBillState) && $vnpBillState != '') {
                $inputData['vnp_Bill_State'] = $vnpBillState;
            }

            ksort($inputData);
            $query = '';
            $i = 0;
            $hashdata = '';
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . '=' . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . '=' . urlencode($value);
                    $i = 1;
                }

                $query .= urlencode($key) . '=' . urlencode($value) . '&';
            }

            $vnpUrl = $vnpUrl . '?' . $query;

            if (isset($vnpHashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnpHashSecret);
                $vnpUrl .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

            return redirect($vnpUrl)->with([
                'code' => '00',
                'message' => 'success',
            ]);
        }

        SendMailConfirmEvent::dispatch($order);
        return redirect()->route('user.order-history',['status' => '0']);
    }

    public function processOrderDetais(Request $request, $orderId)
    {
        $cart = $request->session()->get('cart');
        $order_details = [];
        foreach ($cart as $item) {
            if (!is_array($item)) {
                continue;
            }

            $order_details[] = [
                'order_id' => $orderId,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'totalamount' => $item['price'] * $item['quantity'],
            ];

            $product = Product::findOrFail($item['id']);
            $product->update([
                'quantity' =>  $product->quantity - $item['quantity']
            ]);
        }

        $order_details = OrderDetails::insert($order_details);
        session()->put('cart', []);
    }

    public function paymentCallback()
    {
        $message = 'Giao dịch thành công';
        $vnpSecureHash = request('vnp_SecureHash');
        $vnpHashSecret = config('services.vnpay.vnp_hash_secret');

        $inputData = array();
        foreach (request()->query() as $key => $value) {
            if (substr($key, 0, 4) == 'vnp_') {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = '';

        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . '=' . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . '=' . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnpHashSecret);

        if ($secureHash != $vnpSecureHash) {
            return $message = 'Chữ ký không hợp lệ!';
        }
        if (request('vnp_ResponseCode') != '00') {
            return $message = 'Giao dịch không thành công!';
        }
        Order::where('id', request('vnp_TxnRef'))->update([
            'payment_status' => 'paid'
        ]);
        return view('payment.success', [
            'message' => $message,
        ]);
    }

    public function findDiscount($code)
    {
        return Discount::where(array(
            'code' => $code,
        ))->where('expire_day', '>', '0')->first();
    }

    public function deliveryFee($id)
    {
        $province = Province::find($id);
        return $province->deliveryFee()->first()->price;
    }
}
