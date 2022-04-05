<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Service;

class HomeComponent extends Component
{
    public function render()
    {
        $featured_services = Service::where('featured',1)->inRandomOrder()->take(8)->get();
        $service_categories = ServiceCategory::inRandomOrder()->take(18)->get();
        return view('livewire.home-component',
        [
            'service_categories'=>$service_categories,
            'featured_services' => $featured_services,
        ]
        )->layout('layouts.base');
    }
}
