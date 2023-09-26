<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
class AdminComponent extends Component
{
    public function render()
    {
        $products = DB::table('products')->select('id', 'name', 'price', 'stock_status', 'quantity')->get();
        return view('livewire.admin.admin-dashboard-component',['products'=>$products]);
    }
}
