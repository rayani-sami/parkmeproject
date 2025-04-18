<?php

namespace App\Http\Controllers\Api;


use App\Models\Place;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
   // Créer une réservation
   public function store(Request $request)
   {
       $request->validate([
           'place_id' => 'required|exists:places,id',
           'start_time' => 'required|date',
           'end_time' => 'required|date|after:start_time',
       ]);

       $place = Place::findOrFail($request->place_id);

       if (!$place->is_available) {
           return response()->json(['message' => 'Place is not available'], 400);
       }

       $reservation = Reservation::create([
           'user_id' => Auth::user()->id,
           'place_id' => $request->place_id,
           'start_time' => $request->start_time,
           'end_time' => $request->end_time,
           'status' => 'active',
       ]);

       $place->update(['is_available' => false]);

       return response()->json([
           'message' => 'Reservation created successfully',
           'reservation' => $reservation
       ], 201);
   }


   // Annuler une réservation
   public function cancel($id)
   {
       $reservation = Reservation::findOrFail($id);
       $reservation->update(['status' => 'canceled']);

       $place = $reservation->place;
       $place->update(['is_available' => true]);

       return response()->json(['message' => 'Reservation canceled successfully'], 200);
   }



   public function index()
{
    $user = Auth::user();

    $reservations = Reservation::where('user_id', $user->id)
    ->with(['place.parking'])
        ->orderBy('start_time', 'desc')
        ->get();

    return response()->json([
        'reservations' => $reservations
    ]);
}
}
