<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
   public function index (){
    $reservations = Reservation::with(['user', 'place.parking'])->get();
   // dd($reservations);
    return view('admin.reservation.index')->with(compact( 'reservations'));

   }

   public function delete ($id){


    Reservation::where('id',$id)->delete();

     $message="Reservation has been deleted successfully";

     return redirect('admin/reservations')->with('success_message', $message);
}
}
