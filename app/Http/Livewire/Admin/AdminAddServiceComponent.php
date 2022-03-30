<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Service;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddServiceComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $price;
    public $discount;
    public $slug;
    public $service_category;
    public $thumbnail;
    public $image;
    public $service_description;
    public $inclusion;
    public $exclusion;
    public $tagline;
    public $discount_type;

    public function generateSlug() {
        $this->slug = Str::slug($this->title,'-');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'title'              => "required",
            'price'              =>"required",
            'slug'               =>"required",
            'service_category'   =>"required",
            'thumbnail'          =>"required|mimes:jpeg,png",
            'image'              =>"required|mimes:jpeg,png",
            'service_description'=>"required",
            'inclusion'          =>"required",
            'exclusion'          =>"required",
            'tagline'            =>"required",
        ]);
    }

    public function createService(){
        $this->validate([
            'title'              => "required",
            'price'              =>"required",
            'slug'               =>"required",
            'service_category'   =>"required",
            'thumbnail'          =>"required|mimes:jpeg,png",
            'image'              =>"required|mimes:jpeg,png",
            'service_description'=>"required",
            'inclusion'          =>"required",
            'exclusion'          =>"required",
            'tagline'            =>"required",

        ]);

        $service = new Service();
        $service->service_name = $this->title;
        $service->slug = $this->slug;
        $service->tagline = $this->tagline;
        $service->service_category_id = $this->service_category;
        $service->discount = $this->discount;
        $service->discount_type = $this->discount_type;
        $service->price = $this->price;
        $service->service_description = $this->service_description;
        $service->inclusion = str_replace("\n","|", trim($this->inclusion));
        $service->exclusion = str_replace("\n","|", trim($this->exclusion));

        //Handling the thumbnail
        $imageName = Carbon::now()->timestamp.'.'.$this->thumbnail->extension();
        $this->thumbnail->storeAs('/services/thumbnails',$imageName);
        $service->thumbnail = $imageName;

        //Handling the image
        $mainImageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('/services',$mainImageName);
        $service->service_image = $mainImageName;

        $service->save();

        session()->flash('message', 'Successfully added a new service');


    }
    public function render()
    {
        $categories = ServiceCategory::all();

        return view('livewire.admin.admin-add-service-component',['categories' => $categories])->layout('layouts.base');
    }
}
