<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DiscountController extends Controller
{
    public function index(Request $request)
    {
        $discounts = Discount::all();

        return view("admin.discounts.list", compact("discounts"));
    }

    public function checkoutDiscountProduct(Request $request)
    {
        return true;
    }

    public function showFormAddDiscount()
    {
        $products = Product::all();
        return view("admin.discounts.add-form", compact("products"));
    }
    public function addDiscountCode(Request $request)
    {
        $datavalidated = $request->validate([
            "name" => "required|string|unique:discounts,name",
            "code" => "string|required|unique:discounts,code",
            "value" => "numeric|required|min:0|max:100",
            "product_ids" => "nullable",
            "expire_day" => "numeric|required|min:0",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);


        $datavalidated['product_ids'] = json_encode($datavalidated['product_ids']);
        // dd($datavalidated);
        Discount::insert($datavalidated);

        return redirect()->route('admin.discounts.list')->with("success", "Thêm giảm giá thành công!");
    }

    public function destroyDiscountCode($id)
    {
        $code = Discount::findOrFail($id);
        $code->delete();
        session()->flash('success', 'Xóa thành công!');
        return redirect()->back();
    }
}
