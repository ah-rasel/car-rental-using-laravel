<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddNewCar extends Component
{
    use withFileUploads;
    public $name;
    public $slug;
    public $car_details;
    public $rent_amount;
    public $doors;
    public $passengers;
    public $luggage;
    public $min_age_to_take_rent;
    public $car_photo_path='';
    public $highest_speed;
    public $air_condition;
    public $brand;
    public $review_status;
    public $transmission_mode;
    public $power_type;
    public $car_class='';
    public $model_release;
    public $singlepageimage='';
    public $release='';
    public $car_image_single_page_view='';
    /**
     * @var Brand[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public $brands;

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
            'car_details'=>'required'
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
    public function Add_Car()
    {
        $data = $this->validate([
            'name'=>'required',
            'rent_amount'=>'required|numeric|min:5',
            'doors'=>'required|numeric',
            'passengers'=>'required|numeric',
            'brand'=>'required',
            'luggage'=>'required|numeric',
            'min_age_to_take_rent'=>'required|numeric|min:18|max:70',
            'highest_speed'=>'required|numeric',
            'air_condition'=>'required',
            'review_status'=>'required',
            'transmission_mode'=>'required',
            'power_type'=>'required',
            'car_details'=>'required',
            'car_class'=>'required',
            'model_release'=>'required|numeric'
        ]);
        $carImage = $this->car_photo_path->store('/','cars');
        $car_image_single_page_view = $this->car_image_single_page_view->store('/','cars');

        Car::create([
            'name'=>$data['name'],
            'slug'=>$this->slug,
            'rent_amount'=>$data['rent_amount'],
            'doors'=>$data['doors'],
            'passengers'=>$data['passengers'],
            'luggage'=>$data['luggage'],
            'min_age_to_take_rent'=>$data['min_age_to_take_rent'],
            'highest_speed'=>$data['highest_speed'],
            'air_condition'=>$data['air_condition'],
            'brand_id'=>$data['brand'],
            'added_by_user_id'=>1,
            'review_status'=>$data['review_status'],
            'transmission_mode'=>$data['transmission_mode'],
            'power_type'=>$data['power_type'],
            'car_details'=>$data['car_details'],
            'car_class'=>$data['car_class'],
            'cars_availability'=>1,
            'model_release'=>$data['model_release'],
            'car_photo_path'=>$carImage,
            'car_image_single_page_view'=>$car_image_single_page_view,
        ]);
    }

    public function Brands()
    {
        return Brand::all('id','name');
    }

    public function render()
    {
        $this->brands = $this->Brands();
        $this->slug=Str::slug($this->name);
        return view('livewire.admin-add-new-car');
    }
}
