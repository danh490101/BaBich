<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $suppliers = Supplier::all();

        return view('admin.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
        return view('admin.suppliers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        //
        //B1: Nhan request
        $data = $request->request->all();
        //B2: validation
        $supplier = $request->validate([
            'name' => 'required|string|min:1',
            'email' => 'nullable|string',
            'phone' => 'required|string|min:1',
            'address' => 'required|string|min:1'

        ]);
        $supplier = Supplier::create($supplier);
        return redirect()->route('admin.suppliers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     */
    public function edit($id)
    {
        //
        $supplier = Supplier::findOrFail($id);
        // dd($supplier);
        return view('admin.suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
        $supplier = Supplier::findOrFail($supplier->id);
        $supplierUpdate = $request->validate([
            'name' => [
                'required',
                Rule::unique('suppliers')->ignore($supplier->id),
            ],
            'email' => [
                'nullable'
            ],
            'phone' => [
                'required'
            ],
            'address' => [
                'required'
            ],
        ]);
        $supplier->update($supplierUpdate);

        return redirect()->route('admin.suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        session()->flash('success', 'Xóa thành công!');
        return redirect()->route('admin.suppliers.index');
    }
}
