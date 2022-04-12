<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceProvider;

use Livewire\WithPagination;

class AdminServiceProvidersComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $providers = ServiceProvider::paginate(10);
        return view('livewire.admin.admin-service-providers-component',
        [
            'providers'=>$providers,
        ]
        )->layout('layouts.base');
    }
}
