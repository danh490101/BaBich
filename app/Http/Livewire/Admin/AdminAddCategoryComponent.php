<?php

namespace App\Http\Livewire\Admin;
use Livewire\Component;
use App\Models\Category;

class AdminAddCategoryComponent extends Component
{
    public $name;

    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required'
        ]);
    }

    public function storeCategory(){
        dd(1);
        $this->validate([
            'name'=>'required'
        ]);
        $category = new Category();
        $category->name = $this->name;
        $category->creat();
        session()->flash('message', 'Category has been create successfully!');
    }
    
    public function render()
    {
        return view('livewire.admin.admin-add-category-component');
    }
}
