<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Counter extends Component
{
    public $name;

    public function save()
    {
        $category = new Category();
        $category->name = $this->name;
        $category->save();

        $this->name = null;
        $this->render();
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
