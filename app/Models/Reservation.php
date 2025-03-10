<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'place_id',
        'start_time',
        'end_time',
        'status',
    ];
     // Relation avec l'utilisateur
     public function user()
     {
         return $this->belongsTo(User::class);
     }

     // Relation avec la place
     public function place()
     {
         return $this->belongsTo(Place::class);
     }

     // Relation avec les paiements
     public function payment()
     {
         return $this->hasOne(Payment::class);
     }
}
