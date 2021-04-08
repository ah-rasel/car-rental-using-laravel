<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'review_text',
        'car_id',
        'user_id',
        'review_point',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
