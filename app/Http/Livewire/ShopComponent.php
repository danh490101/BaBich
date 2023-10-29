<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $categories = Category::all();
        $products = Product::paginate(9);
        return view('livewire.shop-component', ['products' => $products,'categories' => $categories]);
    }
}
