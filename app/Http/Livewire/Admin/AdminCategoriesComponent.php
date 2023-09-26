<?php
namespace App\Http\Livewire\Admin;

// use App\Models\Category;
use Livewire\Component;
// use Livewire\WithPagination;
// use Illuminate\Support\Facades\Facade;
// class Illuminate\Support\Facades\DB extends Facade;
use DB;

class AdminCategoriesComponent extends Component
{
    public function render()
    {
        // $categories = Category::orderBy('name','asc');
        $categories = \Illuminate\Support\Facades\DB::table('categories')->select('id', 'name')->get();
        // foreach ($categories as $category) {
        //     echo "ID: " . $category->id . ", Name: " . $category->name . "<br>";
        // }
        return view('livewire.admin.admin-categories-component',['categories'=>$categories]);
    }
}
