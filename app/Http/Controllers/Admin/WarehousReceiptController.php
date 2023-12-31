<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use App\Models\WarehouseDetail;
use App\Models\WarehouseReceipt;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class WarehousReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $warehouse_receipt = WarehouseReceipt::all();
        return view("admin.warehouse-receipt.index", compact("warehouse_receipt"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // dd(12);
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('admin.warehouse-receipt.add', compact('products', 'suppliers'));
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
        // dd(12);

        $validate = $request->validate([
            'quantity' => 'required',
        ]);
        $whreceipt = array(
            'note' => $request['note'],
            'total_warehouse' => $request['price'] * $request['quantity'],
            'supplier_id' => $request['supplier_id'],
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
        );
        $whreceipt = WarehouseReceipt::create($whreceipt);
        $whdetail = array(
            'quantity' => $request['quantity'],
            'price' => $request['price'],
            'product_id' => $request['product_id'],
            'warehouse_receipt_id' => $whreceipt->id
        );
        $product = Product::findOrFail($request['product_id']);
        $product->quantity = $request['quantity'] +  $product->quantity ;
        $whdetail = WarehouseDetail::create($whdetail);
        $product = $product->update();
        session()->flash('success', 'Thêm phiếu nhập thành công!');
        return redirect()->route('admin.warehouse-receipt.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WarehouseReceipt  $warehouseReceipt
     */
    public function edit(WarehouseReceipt $warehouseReceipt)
    {
        //
        $products = Product::all();
        $suppliers = Supplier::all();
        $warehouseReceipt = WarehouseReceipt::findOrFail($warehouseReceipt->id);
        return view('admin.warehouse-receipt.edit', compact('warehouseReceipt', 'products', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WarehouseReceipt  $warehouseReceipt
     */
    public function update(Request $request, WarehouseReceipt $warehouseReceipt)
    {
        //
        $warehouseReceipt = WarehouseReceipt::findOrFail($warehouseReceipt->id);
        $validate = $request->validate([
            'quantity' => 'required',
            'price' => 'required',
        ]);
        $warehouseReceipt -> note = $request['note'];
        $warehouseReceipt -> total_warehouse = $request['price'] * $request['quantity'];
        $warehouseReceipt -> supplier_id = $request['supplier_id'];
        $warehouseReceipt -> user_id =  \Illuminate\Support\Facades\Auth::id();
        $warehouseReceipt ->save();
        $warehouseDetail = WarehouseDetail::where('warehouse_receipt_id' ,'=', $warehouseReceipt->id)->where('product_id','=',$request['product_id'])->first();
        $quantity = $warehouseDetail->quantity;
        $warehouseDetail -> quantity = $request['quantity'];
        $warehouseDetail -> price = $request['price'];
        $warehouseDetail -> product_id = $request['product_id'];
        $warehouseDetail -> save();
        $product = Product::findOrFail($request['product_id']);
        $product->quantity = $request['quantity'] +  $product->quantity - $quantity;
        $product = $product->update();
        return redirect()->route('admin.warehouse-receipt.index');
    }
    public function destroy($id)
    {
        //
        $warehouseReceipt = WarehouseReceipt::findOrFail($id);
        $warehouseDetails = WarehouseDetail::where('warehouse_receipt_id' ,'=', $warehouseReceipt->id)->get();
        foreach($warehouseDetails as $warehouseDetail){
            $product = $warehouseDetail -> product() -> first();
            $product ->quantity = $product ->quantity - $warehouseDetail -> quantity;
            $product->save();
        }
        WarehouseDetail::where('warehouse_receipt_id' ,'=', $warehouseReceipt->id)->delete();
        $warehouseReceipt->delete();
        session()->flash('success', 'Xóa thành công!');
        return redirect()->back();
    }
}
