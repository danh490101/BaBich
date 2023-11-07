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
            'price' => 'required',
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
        $product->price = $request['price'];
        $whdetail = WarehouseDetail::create($whdetail);
        $product = $product->update();

        return redirect()->route('admin.warehouse-receipt.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WarehouseReceipt  $warehouseReceipt
     * @return \Illuminate\Http\Response
     */
    public function show(WarehouseReceipt $warehouseReceipt)
    {
        //
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
        $whreceipt = array(
            'note' => $request['note'],
            'total_warehouse' => $request['price'] * $request['quantity'],
            'supplier_id' => $request['supplier_id'],
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
        );
        $whreceipt = WarehouseReceipt::update($whreceipt);
        $whdetail = array(
            'quantity' => $request['quantity'],
            'price' => $request['price'],
            'product_id' => $request['product_id'],
        );
        $product = Product::findOrFail($request['product_id']);
        $product->quantity = $request['quantity'] +  $product->quantity ;
        $product->price = $request['price'];
        $whdetail = WarehouseDetail::update($whdetail);
        $product = $product->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WarehouseReceipt  $warehouseReceipt
     */
    public function destroy($id)
    {
        //
        $warehouseReceipt = WarehouseReceipt::findOrFail($id);
        // dd($warehouseReceipt);
        $warehouseReceipt->delete();
        session()->flash('success', 'Xóa thành công!');
        return redirect()->back();
    }
}
