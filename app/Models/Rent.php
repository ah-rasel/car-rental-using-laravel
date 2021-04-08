<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'rent_date',
        'return_date',
        'rent_place_id',
        'return_place_id',
        'rent_amount',
        'car_id',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'rent_date',
        'return_date',
    ];
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function getCurrentRentStatusAttribute()
    {
        return [
                '0'=>'Under Review',
                '1'=>'Aproved',
                '2'=>'Completed',
                '3'=>'Cancelled',
            ][$this->rent_status] ?? "Under Review";
    }
    public function getCurrentRentStatusColorAttribute()
    {
        return [
                '0'=>'bg-info',
                '1'=>'bg-success',
                '2'=>'Completed',
                '3'=>'bg-danger',
            ][$this->rent_status] ?? "bg-info";
    }
}
