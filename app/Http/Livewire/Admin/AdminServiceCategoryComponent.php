<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceCategory;

class AdminServiceCategoryComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $categories = ServiceCategory::paginate(10);
        return view('livewire.admin.admin-service-category-component',['categories' => $categories])->layout('layouts.base');
    }
}
