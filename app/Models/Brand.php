<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'brand_details',
        'brand_dark_image_path',
        'brand_light_image_path',
    ];
    public function cars()
    {
        return $this->hasMany(Car::class)
                    ->Where('cars_availability',1)
                    ->orderBy('id', 'desc')
                    ->limit(4);
    }
}
