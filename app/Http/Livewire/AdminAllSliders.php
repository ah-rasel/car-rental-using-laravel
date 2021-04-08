<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAllSliders extends Component
{
    use WithFileUploads;

    public $sliders;
    public $search = '';
    public $sortField = 'id';
    public $orderBy = 'desc';
    public $ShowModalbox = false;
    public $cars;
    public $brands;
    public $brand_id;
    public $car_id;
    public $slider_text;
    public $slider_image_path;
    public $edit_slider_image_path;
    public $edit_brand_id;
    public $edit_car_id;
    public $current_slider_id;
    public $ShowEditModalbox = false;


    public function mount()
    {
        $this->AllSliders();
    }
    public function CarsAndBrands()
    {
        $this->brands = Brand::all('id','name');
        $this->cars = Car::all()->Where('brand_id',$this->brand_id);
    }
    public function ShowModal()
    {
        $this->ShowModalbox = $this->ShowModalbox == true ? $this->ShowModalbox = false:$this->ShowModalbox = true;
    }

    public function EditModalBox()
    {
        $this->ShowEditModalbox = $this->ShowEditModalbox == true ? $this->ShowEditModalbox = false:$this->ShowEditModalbox = true;

    }
    public function ShowEditModal($id)
    {
        $edit_slider = Slider::with('car.brand')->Where('id',$id)->first();
        $this->current_slider_id = $edit_slider->id;
        $this->slider_image_path = $edit_slider->slider_image_path;
        $this->slider_text = $edit_slider->slider_text;
        $this->edit_brand_id = $edit_slider->car->brand->id;
        $this->edit_car_id = $edit_slider->car->id;
        $this->ShowEditModalbox = $this->ShowEditModalbox == true ? $this->ShowEditModalbox = false:$this->ShowEditModalbox = true;
    }
    public function AllSliders()
    {
        $this->sliders = Slider::search('slider_text',$this->search)
            ->with(['car'])
            ->orderBy($this->sortField, $this->orderBy)
            ->get();
    }

    public function UpdatedCarId()
    {
        $this->validate([
            'car_id'=>'required|numeric'
        ]);
    }

    public function Add_Slide()
    {
        $data = $this->validate([
            'car_id'=>'required',
        ]);
        $sliderImage = $this->slider_image_path ? $this->slider_image_path->store('/','cars') : '';
        $this->slider_text = $this->slider_text? $this->slider_text :'Select this car to have an ultimate comfort throughout your visit . As well as you can select from our other collection .';

        Slider::create([
            'car_id'=>$this->car_id,
            'slider_text'=>$this->slider_text,
            'slider_image_path'=>$sliderImage,
        ]);
        $this->slider_image_path='';
        $this->slider_text='';
        $this->brand_id='';
        $this->car_id='';
        $this->ShowModalbox = false;
    }
    public function sortBy($field)
    {


        $this->sortField === $field ? ($this->orderBy = $this->orderBy==='asc' ? 'desc' : 'asc'):$this->orderBy = 'asc';

        $this->sortField = $field;
    }

    public function UpdatedEditSliderImagePath()
    {
        $this->slider_image_path = null;
    }
    public function UpdateSlider($id)
    {

        $slider = Slider::Where('id',$id)->first();

        if ($this->edit_slider_image_path){
            Storage::delete('cars/'.$slider->slider_image_path);
            $sliderImage = $this->edit_slider_image_path->store('/','cars');
            $slider->slider_image_path = $sliderImage;
        }
        $slider->car_id = $this->car_id ? $this->car_id:$slider->car_id;
        $slider->slider_text = $this->slider_text? $this->slider_text :'Select this car to have an ultimate comfort throughout your visit . As well as you can select from our other collection .';

        $slider->save();

        $this->slider_image_path='';
        $this->slider_text='';
        $this->brand_id='';
        $this->car_id='';
        $this->ShowEditModalbox = false;


    }

    public function DeleteSlider($id)
    {
        $slider = Slider::Where('id',$id)->first();
        Storage::delete('cars/'.$slider->slider_image_path);
        $slider->delete();
    }

    public function changeStatus($id)
    {
        $slider = Slider::Where('id',$id)->first();
        $slider->approve_status = $slider->approve_status == 0? 1:0;
        $slider->save();
    }
    public function render()
    {
        $this->AllSliders();
        $this->CarsAndBrands();
        return view('livewire.admin-all-sliders');
    }
}
