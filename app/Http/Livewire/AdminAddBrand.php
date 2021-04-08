<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddBrand extends Component
{
    use withFileUploads;
    public $brand_light_image;
    public $brand_dark_image;
    public $name='';
    public $slug='';
    public $description='';
    public $light_image;

    public function AddBrand()
    {

        $data = $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'brand_light_image'=>'max:10000',
            'brand_dark_image'=>'max:10000',
        ]);

       $fileName = $this->brand_light_image->store('/','brands');
       $fileName2 = $this->brand_dark_image->store('/','brands');

        Brand::create([
            'name'=>$data['name'],
            'slug'=>$data['slug'],
            'brand_details'=>$data['description'],
            'brand_light_image_path'=>$fileName,
            'brand_dark_image_path'=>$fileName2,
        ]);

         $this->name='';
         $this->slug='';
         $this->description='';
         $this->brand_light_image='';
         $this->brand_dark_image='';
    }
    public function render()
    {
        $this->slug=Str::slug($this->name);
        return view('livewire.admin-add-brand');
    }

}
