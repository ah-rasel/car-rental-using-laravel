<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'slider_text',
        'slider_image_path'
    ];

    public function getApprovalAttribute()
    {
        return [
                '0'=>'Denied',
                '1'=>'Approved',
            ][$this->approve_status] ?? "!! Error";
    }
    public function getStatusColorAttribute()
    {
        return [
                '0'=>' bg-danger',
                '1'=>' bg-success',
            ][$this->approve_status] ?? " bg-success ";
    }
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
