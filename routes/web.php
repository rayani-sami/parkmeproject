<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\ParkingController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/dashboard', function () {
    return view('welcome');
});


route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function (){
    Route::match(['get','post'],'login',[AdminController::class, 'login']);


    Route::group(['middleware'=>['admin']],function (){

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::resource('parkings', ParkingController::class)->names('admin.parkings');
        Route::get('delete-parking/{id}','ParkingController@delete');

        Route::resource('places', PlaceController::class)->names('admin.places');
        Route::get('delete-place/{id}','PlaceController@delete');
        Route::resource('users', UserController::class)->names('admin.users');
        route::post('/update-user-status','UserController@UpdateUserStatus');
        Route::get('delete-users/{id}','UserController@delete');



        Route::resource('reservations', ReservationController::class)->names('admin.reservations');
        Route::get('delete-reservation/{id}','ReservationController@delete');
        Route::resource('payments', PaymentController::class)->names('admin.payments');
        Route::put('/payments/{payment}/status', [PaymentController::class, 'updateStatus'])->name('admin.payments.updateStatus');



        /****************settings */



        Route::match(['get','post'],'/update-admin-details','AdminController@updateAdminDetails');
         Route::match(['get','post'],'update-admin-password','AdminController@updateAdminPassword');
    });


/************************get all users */


    });
