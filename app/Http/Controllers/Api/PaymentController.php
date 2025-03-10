<?php

namespace App\Http\Controllers\Api;

use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
   // Créer un paiement pour une réservation
   public function store(Request $request)
   {
       $request->validate([
           'reservation_id' => 'required|exists:reservations,id',
           'amount' => 'required|numeric',
           'payment_method' => 'required|string',
           'transaction_id' => 'nullable|string',
       ]);

       $reservation = Reservation::findOrFail($request->reservation_id);

       // Vérifier si la réservation est active
       if ($reservation->status !== 'active') {
           return response()->json(['message' => 'Reservation is not active'], 400);
       }

       // Créer le paiement
       $payment = Payment::create([
           'reservation_id' => $request->reservation_id,
           'amount' => $request->amount,
           'payment_method' => $request->payment_method,
           'status' => 'pending',
           'transaction_id' => $request->transaction_id,
       ]);

       // Mettre à jour le statut de la réservation si le paiement est réussi
       if ($request->status === 'completed') {
           $reservation->update(['status' => 'completed']);
           $payment->update(['status' => 'completed']);
       }

       return response()->json(['message' => 'Payment created successfully', 'payment' => $payment], 201);
   }

   // Mettre à jour le statut d'un paiement
   public function updateStatus(Request $request, $id)
   {
       $request->validate([
           'status' => 'required|in:pending,completed,failed',
       ]);

       $payment = Payment::findOrFail($id);
       $payment->update(['status' => $request->status]);

       return response()->json(['message' => 'Payment status updated successfully', 'payment' => $payment], 200);
   }
}
