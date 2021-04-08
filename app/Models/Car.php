<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'rent_amount',
        'doors',
        'passengers',
        'luggage',
        'min_age_to_take_rent',
        'car_photo_path',
        'highest_speed',
        'air_condition',
        'brand_id',
        'added_by_user_id',
        'review_status',
        'transmission_mode',
        'power_type',
        'car_details',
        'car_class',
        'car_image_single_page_view',
        'cars_availability',
        'model_release',
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function getAirConditionStatusAttribute()
    {
        return [
                '0'=>'No',
                '1'=>'Yes',
            ][$this->air_condition] ?? "No";
    }
    public function getAvailableOrNotAttribute()
    {
        return [
                '0'=>'Not Available',
                '1'=>'Available',
            ][$this->cars_availability] ?? "No";
    }
    public function getStatusColorAttribute()
    {
        return [
                '0'=>' bg-danger',
                '1'=>' bg-success',
            ][$this->cars_availability] ?? " bg-success ";
    }
    public function getTransmissionAttribute()
    {
        return [
                '0'=>'Auto',
                '1'=>'Manual',
            ][$this->transmission_mode] ?? "Auto";
    }
    public function getEnergyAttribute()
    {
        return [
                '0'=>'Petrol',
                '1'=>'Diesel',
                '2'=>'Gasoline',

            ][$this->power_type] ?? "Gasoline";
    }
    public function getClassOfCarAttribute()
    {
        return [
                '1'=>'Business',
                '0'=>'Premium',
                '2'=>'General',
            ][$this->car_class] ?? "BUSINESS";
    }
}
