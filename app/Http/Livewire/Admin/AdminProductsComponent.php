<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminProductsComponent extends Component
{
    public function render()
    {
        {
            // $categories = Category::orderBy('name','asc');
            $products = DB::table('products')->select('id', 'name', 'price', 'stock_status', 'quantity')->get();
            // foreach ($categories as $category) {
            //     echo "ID: " . $category->id . ", Name: " . $category->name . "<br>";
            // }
            return view('livewire.admin.admin-products-component', ['products' => $products]);
        }
    }
}
