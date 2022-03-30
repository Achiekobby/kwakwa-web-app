<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Service;
use Livewire\WithPagination;

class AdminServicesComponent extends Component
{
    use WithPagination;

    public function deleteService($service_id){
        $service = Service::find($service_id);

        if($service->thumbnail){
            unlink('images/services/thumbnails'.'/'.$service->thumbnail);
        }

        if($service->service_image){
            unlink('images/services'.'/'.$service->service_image);
        }

        $service->delete();

        session()->flash('message','Successfully deleted service');
    }
    public function render()
    {

        $all_services = Service::paginate(10);
        return view('livewire.admin.admin-services-component',['services' => $all_services])->layout('layouts.base');
    }
}
