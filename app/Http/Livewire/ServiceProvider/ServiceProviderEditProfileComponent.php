<?php

namespace App\Http\Livewire\ServiceProvider;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class ServiceProviderEditProfileComponent extends Component
{

    use WithFileUploads;

    public $service_provider_id;
    public $image;
    public $about;
    public $city;
    public $service_category;
    public $service_locations;
    public $newImage;

    public function mount(){
        $serviceProvider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        $this->service_provider_id = $serviceProvider->id;

        $this->image = $serviceProvider->image;
        $this->about = $serviceProvider->about;
        $this->city = $serviceProvider->city;
        $this->service_category_id = $serviceProvider->service_category;
        $this->service_locations = $serviceProvider->service_locations;

    }

    public function updateProfile(){
        $service_provider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        if($this->newImage){
            $imageName = \Carbon\Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('sproviders',$imageName);
            $service_provider->image = $imageName;
        }

        $service_provider->about = $this->about;
        $service_provider->city = $this->city;
        $service_provider->service_category_id = $this->service_category;
        $service_provider->service_locations = $this->service_locations;

        $service_provider->save();

        session()->flash('message','Profile has been updated successfully');
    }

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.service-provider.service-provider-edit-profile-component',
        [
            'categories'=>$categories,
        ])->layout('layouts.base');
    }
}
