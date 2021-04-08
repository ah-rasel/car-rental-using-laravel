<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditBrandDetails extends Component
{
    use WithFileUploads;
    public $brand;
    public $edit_brand_light_image = '';
    public $edit_brand_dark_image = '';
    public $edit_slug = '';
    /**
     * @var bool|mixed
     */
    public $brand_updated = false ;

    public function mount($id)
    {
        try {
            $this->brand = Brand::Where('id',$id)
                ->firstOrFail();
        }catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception){
        }
    }
    protected $rules = [
        'brand.name'=>'required',
        'brand.slug'=>'required',
        'brand.brand_details'=>'required',
        'brand.brand_light_image_path'=>'max:10000',
        'brand.brand_dark_image_path'=>'max:10000',
    ];

    public function Update_Brand()
    {

        $this->validate();

        if ($this->edit_brand_light_image){
//            $this->edit_brand_light_image = get_client_original_name($this->edit_brand_light_image);
            Storage::delete('brands/'.$this->brand->brand_light_image_path);
            $this->brand->brand_light_image_path = $this->edit_brand_light_image->store('/','brands');
        }
        if ($this->edit_brand_dark_image){
            Storage::delete('brands/'.$this->brand->brand_dark_image_path);
            $this->brand->brand_dark_image_path = $this->edit_brand_dark_image->store('/','brands');
        }


        $this->brand->slug=$this->edit_slug;
        $this->brand->save();
        $this->brand_updated = true;
        $this->dispatchBrowserEvent('swal:modal',[
            'icon'=>'success',
            'title'=>'Brand Details has been Updated Successfully',
            'text'=>'',
            'timer'=>1500
        ]);
    }

    public function render()
    {
        $this->edit_slug =Str::slug($this->brand->name);
        return view('livewire.edit-brand-details');
    }
}
