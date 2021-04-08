<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
     return view('layouts.adminviews.dashboard');
    }

    public function viewUsers()
    {
        return view('layouts.adminviews.all_users');
    }
    public function AddNewUser()
    {
        return "User Edit Page";
    }
    public function UpdateUser()
    {
        return "User Update Page ";
    }

    public function viewBrands()
    {
        return view('layouts.adminviews.alL_brands');
    }
    public function viewCars()
    {
        return view('layouts.adminviews.all_cars');
    }

    public function AddNewBrand()
    {
        return view('layouts.adminviews.add_new_brand');
    }
    public function AddNewCar()
    {
        return view('layouts.adminviews.add-new-car');
    }

    public function EditCar($id)
    {
        return view('layouts.adminviews.edit-car',compact('id'));
    }
    public function EditBrand($id)
    {
        return view('layouts.adminviews.edit-brand',compact('id'));
    }

//    public function viewSliders()
//    {
//        return view('layouts.adminviews.all_sliders');
//    }
}
