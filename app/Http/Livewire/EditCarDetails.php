<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCarDetails extends Component
{
    use WithFileUploads;
    public $car;
    public $car_updated = false;
    public $edit_slug;
    public $edit_car_photo_path='';
    public $edit_car_image_single_page_view='';
    public $brands;
    public function mount($id)
    {
        try {
            $this->car = Car::Where('id',$id)
                ->firstOrFail();
        }catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception){
            return $this->redirect(404);
        }

    }

    protected $rules = [
        'car.name'=>'required',
        'car.rent_amount'=>'required|numeric|min:5',
        'car.doors'=>'required|numeric',
        'car.passengers'=>'required|numeric',
        'car.brand_id'=>'required',
        'car.luggage'=>'required|numeric',
        'car.min_age_to_take_rent'=>'required|numeric|min:18|max:70',
        'car.highest_speed'=>'required|numeric',
        'car.air_condition'=>'required',
        'car.review_status'=>'required',
        'car.transmission_mode'=>'required',
        'car.power_type'=>'required',
        'car.car_details'=>'required',
        'car.car_class'=>'required',
        'car.model_release'=>'required|numeric'
    ];


    public function Update_Car()
    {
        $this->validate();

        if ($this->edit_car_photo_path){
            Storage::delete('cars/'.$this->car->car_photo_path);
            $this->car->car_photo_path = $this->edit_car_photo_path->store('/','cars');
        }

        if ($this->edit_car_image_single_page_view){
            Storage::delete('cars/'.$this->car->car_image_single_page_view);
            $this->car->car_image_single_page_view = $this->edit_car_image_single_page_view->store('/','cars');
        }
        $this->car->slug=$this->edit_slug;
        $this->car->save();
        $this->car_updated = true;
        $this->dispatchBrowserEvent('swal:modal',[
            'icon'=>'success',
            'title'=>'Car Details has been Updated Successfully',
            'text'=>'',
            'timer'=>1500
        ]);
//        $this->reset();
    }


    public function UpdatedName()
    {
        $this->validate([
            'name'=>'required'
        ]);
    }
    public function UpdatedRentAmount()
    {
        $this->validate([
            'rent_amount'=>'required|numeric'
        ]);
    }
    public function UpdatedCarDetails()
    {
        $this->validate([
            'car.car_details'=>'required'
        ]);
    }
    public function UpdatedDoors()
    {
        $this->validate([
            'doors'=>'required|numeric',
        ]);
    }
    public function UpdatedPassengers()
    {
        $this->validate([
            'passengers'=>'required|numeric|min:2',
        ]);
    }
    public function UpdatedLuggage()
    {
        $this->validate([
            'luggage'=>'required|numeric',
        ]);
    }
    public function UpdatedMinAgeToTakeRent()
    {
        $this->validate([
            'min_age_to_take_rent'=>'required|numeric|min:18|max:70',
        ]);
    }
    public function UpdatedHighestSpeed()
    {
        $this->validate([
            'highest_speed'=>'required|numeric',
        ]);
    }
    public function UpdatedModelRelease()
    {
        $this->validate([
            'model_release'=>'required|numeric'
        ]);
    }
    public function Brands()
    {
        return Brand::all('id','name');
    }
    public function UpdatedEditCarPhotoPath()
    {
        $this->car->car_photo_path = null;
    }
    public function UpdatedEditCarImageSinglePageView()
    {
        $this->car->car_image_single_page_view = null;
    }

    public function render()
    {
        $this->edit_slug =Str::slug($this->car->name);
        $this->brands = $this->Brands();
        return view('livewire.edit-car-details');
    }
}
