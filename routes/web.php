<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/acar','layouts.adminviews.add-new-car')->name('acar');
Route::get('/car/{id}/edit',[DashboardController::class,'EditCar'])->name('ecar');

Route::get('/car/{slug?}',[CarsController::class,'ViewCarSinglePage'])->name('car.single');







Route::get('getform',[CarsController::class,'getFormData'])->name('getform');

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::get('/',[HomeController::class,'index'])->name('/');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile',[HomeController::class,'Profile'])->name('user.profile');

    Route::group(['middleware' => 'role:admin'], function() {
        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

        Route::get('/users',[DashboardController::class,'viewUsers'])->name('admin.users');
        Route::get('/user/{username}/edit',[DashboardController::class,'UpdateUser'])->name('admin.user.edit');
        Route::get('/admin/add-new-user',[DashboardController::class,'AddNewUser'])->name('admin.new.user');

        Route::get('/brands/all',[DashboardController::class,'viewBrands'])->name('admin.brands');
        Route::get('/brand/new',[DashboardController::class,'AddNewBrand'])->name('admin.new.brand');
        Route::get('/brand/{id}/edit',[DashboardController::class,'EditBrand'])->name('admin.update.brand');

        Route::get('/cars/all',[DashboardController::class,'ViewCars'])->name('admin.cars');
        Route::get('/new/car',[DashboardController::class,'ViewCars'])->name('admin.new.car');

        Route::view('/sliders','layouts.adminviews.all_sliders')->name('admin.sliders');



//        Route::get('/car/{id}/edit',[DashboardController::class,'EditCar'])->name('admin.edit-car');
    });


});
