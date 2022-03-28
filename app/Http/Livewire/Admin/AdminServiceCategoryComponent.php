<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceCategory;

class AdminServiceCategoryComponent extends Component
{
    use WithPagination;

    public function deleteServiceCategory($category_id){
        $s_category = ServiceCategory::find($category_id);
        if($s_category->category_image){
            unlink('images/categories/'.$s_category->category_image);
        }

        $s_category->delete();
        session()->flash('message', 'Service Category has been deleted successfully');
    }
    
    public function render()
    {
        $categories = ServiceCategory::paginate(10);
        return view('livewire.admin.admin-service-category-component',['categories' => $categories])->layout('layouts.base');
    }
}
