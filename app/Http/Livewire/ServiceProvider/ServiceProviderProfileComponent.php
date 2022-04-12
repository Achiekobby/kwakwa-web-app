<?php

namespace App\Http\Livewire\ServiceProvider;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceProvider;

class ServiceProviderProfileComponent extends Component
{
    public function render()
    {
        $service_provider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        return view('livewire.service-provider.service-provider-profile-component',
                    [
                        'service_provider'=>$service_provider
                    ]
                )->layout('layouts.base');
    }
}
