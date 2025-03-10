<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'address',
        'total_spaces',
        'available_spaces',
        'latitude',
        'longitude',
    ];
      // Relation avec les places
      public function places()
      {
          return $this->hasMany(Place::class);
      }
}
