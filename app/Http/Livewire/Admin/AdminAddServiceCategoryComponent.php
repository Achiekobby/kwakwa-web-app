<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use Illuminate\Support\Str;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $slug;
    public $image;

    public function generateSlug(){
        $this->slug= Str::slug($this->title,'-');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            "title"=>"required",
            "slug"=>"required",
            "image"=>"required|mimes:jpeg,png"
        ]);
    }

    public function createNewCategory(){
        $this->validate([
            "title"=>"required",
            "slug"=>"required",
            "image"=>"required|mimes:jpeg,png"
        ]);

        $service_category = new ServiceCategory();

        $service_category->category_title = $this->title;
        $service_category->slug = $this->slug;

        /**
         * *Handling the image file
         */
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('categories',$imageName);

        $service_category->category_image = $imageName;

        $service_category->save();

        session()->flash('message','Category saved successfully');

    }

    public function render()
    {
        return view('livewire.admin.admin-add-service-category-component')->layout('layouts.base');
    }
}
