<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ServiceCategory;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdminEditServiceComponent extends Component
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
    public $service_slug;

    public $newThumbnail;
    public $newImage;



    public function mount($service_slug){

        $this->service_slug = $service_slug;

        $old_service = Service::where('slug', $this->service_slug)->first();

        $this->title               = $old_service->service_name;
        $this->price               = $old_service->price;
        $this->discount            = $old_service->discount;
        $this->slug                = $old_service->slug;
        $this->service_category    = $old_service->service_category_id;
        $this->thumbnail           = $old_service->thumbnail;
        $this->image               = $old_service->service_image;
        $this->service_description = $old_service->service_description;
        $this->inclusion           = str_replace("\n","|",trim($old_service->inclusion));
        $this->exclusion           = str_replace("\n","|",trim($old_service->exclusion));
        $this->tagline             = $old_service->tagline;
        $this->discount_type       = $old_service->discount_type;

    }

    public function generateSlug(){
        $this->slug = Str::slug($this->slug,'-');
    }


    public function update($fields){
        $this->validateOnly($fields,[
            'title'              => "required",
            'price'              =>"required",
            'slug'               =>"required",
            'service_category'   =>"required",
            'service_description'=>"required",
            'inclusion'          =>"required",
            'exclusion'          =>"required",
            'tagline'            =>"required",
        ]);
        if($this->newThumbnail){
            $this->validateOnly($fields,[
                'newThumbnail' => "required|mimes:jpeg,png",
            ]);
        }

        if($this->newImage){
            $this->validateOnly($fields,[
                'newImage' => "required|mimes:jpeg,png",
            ]);
        }
    }

    public function updateService(){
        $this->validate([
            'title'              => "required",
            'price'              =>"required",
            'slug'               =>"required",
            'service_category'   =>"required",
            'service_description'=>"required",
            'inclusion'          =>"required",
            'exclusion'          =>"required",
            'tagline'            =>"required",
        ]);

        if($this->newThumbnail){
            $this->validate([
                'newThumbnail' => "required|mimes:jpeg,png",
            ]);
        }

        if($this->newImage){
            $this->validate([
                'newImage' => "required|mimes:jpeg,png",
            ]);
        }

        $service = Service::where('slug',$this->service_slug)->first();
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
        if($this->newThumbnail){
            unlink('images/services/thumbnails'.'/'.$service->thumbnail);
            $imageName = Carbon::now()->timestamp.'.'.$this->newThumbnail->extension();
            $this->newThumbnail->storeAs('/services/thumbnails',$imageName);
            $service->thumbnail = $imageName;
        }


        //Handling the image
        if($this->newImage){
            unlink('images/services'.'/'.$service->service_image);
            $mainImageName = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('/services',$mainImageName);
            $service->service_image = $mainImageName;
        }


        $service->save();

        session()->flash('message', 'Successfully updated the service');


    }

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-edit-service-component',['categories' => $categories])->layout('layouts.base');
    }
}
