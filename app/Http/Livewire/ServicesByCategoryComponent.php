<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Models\ServiceCategory;

class ServicesByCategoryComponent extends Component
{
    public $category_slug;

    public function mount($category_slug){
        $this->category_slug = $category_slug;
    }


    public function render()
    {
        $s_category = ServiceCategory::where('slug', $this->category_slug)->first();
        // dd($s_category);

        return view('livewire.services-by-category-component',['s_category' => $s_category])->layout('layouts.base');
    }
}
