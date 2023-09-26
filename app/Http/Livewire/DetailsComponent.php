<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class DetailsComponent extends Component
{
    public function mount($id){
        $this->id = $id;
    }
    public function render()
    {
        $product = Product::where('id', $this->id)->first();
        return view('livewire.details-component', ['product' => $product]);
    }
}
