<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function getFormData(Request $request)
    {
        return $request->all();
    }

    public function ViewCarSinglePage($slug)
    {
        $car = Car::with('reviews.user')
            ->Where('slug',$slug)->first();
        return view('layouts.userviews.car-singlepage',compact('car'));
    }
}
