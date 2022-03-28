<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AdminEditServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $category_id;
    public $title;
    public $slug;
    public $image;
    public $newimage;

    public function mount($category_id){
        $s_category = ServiceCategory::find($category_id);

        $this->category_id  = $s_category->id;
        $this->title        = $s_category->category_title;
        $this->slug         = $s_category->slug;
        $this->image        = $s_category->category_image;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->title,"-");
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'title' => 'required',
            'slug' => 'required',
        ]);
        if($this->newimage){
            $this->validateOnly([
                "newimage" => "required|mimes:jpeg,png",
            ]);
        }
    }

    public function updateServiceCategory(){
        $this->validate([
            'title' => 'required',
            'slug' => 'required',
        ]);

        if($this->newimage){
            $this->validate([
                'newimage'=>'required|mimes:jpeg, png',
            ]);

        }

        $s_category = ServiceCategory::find($this->category_id);
        $s_category->category_title = $this->title;
        $s_category->slug = $this->slug;

        if($this->newimage){
            $newImageName = Carbon::now()->timestamp.'.'.$newimage->extension();
            $this->newimage->storeAs('categories',$newImageName);

            $s_category->category_image = $newImageName;
        }
        $s_category->save();
        session()->flash('message','Service Category has been updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-service-category-component')->layout('layouts.base');
    }
}
