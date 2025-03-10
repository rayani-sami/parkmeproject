<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Place extends Model
{
    use HasFactory;
    protected $fillable = [
        'parking_id',
        'number',
        'is_available',
    ];

    // Relation avec le parking
    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }
  // Relation avec les réservations
  public function reservations()
  {
      return $this->hasMany(Reservation::class);
  }
}
