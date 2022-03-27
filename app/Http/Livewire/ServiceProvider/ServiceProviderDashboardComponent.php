<?php

namespace App\Http\Livewire\ServiceProvider;

use Livewire\Component;

class ServiceProviderDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.service-provider.service-provider-dashboard-component')->layout('layouts.base');
    }
}
