<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChangeLocationComponent extends Component
{
    public $streetNumber;
    public $route;
    public $city;
    public $region;
    public $country;
    public $zipCode;

    public function changeLocation(){

        //storing address values in sessions
        session()->put('streetNumber',$this->streetNumber);
        session()->put('route',$this->route);
        session()->put('city',$this->city);
        session()->put('region',$this->region);
        session()->put('country',$this->country);
        session()->put('zipCode',$this->zipCode);

        // Flash message
        session()->flash('message','Your Location has been changed');

        $this->emitTo('location-component','refreshComponent');
    }


    public function render()
    {
        return view('livewire.change-location-component')->layout('layouts.base');
    }
}
