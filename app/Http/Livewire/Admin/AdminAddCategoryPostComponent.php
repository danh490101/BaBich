<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminAddCategoryPostComponent extends Component
{
    public function save()
    {
        dd(1);
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component');
    }
}
