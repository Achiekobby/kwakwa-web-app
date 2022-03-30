<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Service;
use Livewire\WithPagination;

class AdminServicesComponent extends Component
{
    use WithPagination;
    public function render()
    {

        $all_services = Service::paginate(10);
        return view('livewire.admin.admin-services-component',['services' => $all_services])->layout('layouts.base');
    }
}
