<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithFileUploads;

class AdminEditSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public $status;
    public $newImage;

    public $slide_id;

    public function mount($slide_id){

        $old_slide = Slider::find($slide_id);
        $this->slide_id = $old_slide->id;
        $this->title = $old_slide->title;
        $this->image = $old_slide->image;
        $this->status = $old_slide->status;

    }

    public function update($fields){
        $this->validateOnly($fields,[
            'title' => 'required',
        ]);

        if($this->newImage){
            $this->validateOnly($fields,[
                'newImage'=>'required|mimes:jpeg,png,jpg'
            ]);
        }
    }

    public function updateSlide(){
        $this->validate([
            'title' => 'required',
        ]);

        if($this->newImage){
            $this->validate([
                'newImage'=> "required|mimes:jpeg,png,jpg",
            ]);
        }

        $slide = Slider::find($this->slide_id);
        $slide->title = $this->title;
        $slide->status = $this->status;

        /**
         * TODO: Handle the new image upload
         */
        if($this->newImage){
            unlink('images/Sliders'.'/'.$this->image);
            $newImageName = \Carbon\Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('Sliders',$newImageName);
            $slide->image = $newImageName;
        }

        $slide->save();

        session()->flash('message','Slide Details has been updated successfully');

    }




    public function render()
    {
        return view('livewire.admin.admin-edit-slider-component')->layout('layouts.base');
    }
}
