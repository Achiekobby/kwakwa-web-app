<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\WithPagination;

class AdminServicesByCategoryComponent extends Component
{
    use WithPagination;
    public $category_slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }


    public function render()
    {
        $category = ServiceCategory::where('slug', $this->category_slug)->first();

        $services = Service::where('service_category_id',$category->id)->paginate(10);

        return view('livewire.admin.admin-services-by-category-component',[
            'category_title'=>$category->category_title,
            'services'=>$services
        ])->layout('layouts.base');
    }
}
