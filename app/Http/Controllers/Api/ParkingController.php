<?php

namespace App\Http\Controllers\Api;

use App\Models\Parking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParkingController extends Controller
{
     // Récupérer la liste des parkings
     public function index()
     {
         $parkings = Parking::all();
         dd( $parkings);
         return response()->json($parkings);
     }

     // Récupérer les places disponibles d'un parking
     public function showPlaces($id)
     {
         $parking = Parking::findOrFail($id);
         $places = $parking->places()->where('is_available', true)->get();
         return response()->json($places);
     }
}
