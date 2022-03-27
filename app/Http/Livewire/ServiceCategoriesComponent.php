<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;

class ServiceCategoriesComponent extends Component
{
    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.service-categories-component',['categories' => $categories])->layout('layouts.base');
    }
}
