<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Slider;

class HomeComponent extends Component
{
    public function render()
    {
        $featured_services = Service::where('featured',1)->inRandomOrder()->take(8)->get();
        $service_categories = ServiceCategory::inRandomOrder()->take(18)->get();
        $featured_categories = ServiceCategory::where('featured',1)->inRandomOrder()->take(8)->get();
        $service_id = ServiceCategory::whereIn('slug',['ac','tv','refrigerator','geyser','water-purifier'])->get()->pluck('id');

        $appliance_services = Service::whereIn('service_category_id',$service_id)->inRandomOrder()->take(8)->get();

        $slides = Slider::where('status',1)->get();
        return view('livewire.home-component',
        [
            'service_categories'=>$service_categories,
            'featured_services' => $featured_services,
            'featured_categories' =>$featured_categories,
            'appliance_services' => $appliance_services,
            'slides' => $slides,
        ]
        )->layout('layouts.base');
    }
}
