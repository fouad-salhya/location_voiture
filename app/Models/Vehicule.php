<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    public function marque() {
        return $this->belongsTo(Marque::class);
    }
 
    public function reservation() {
        return $this->hasOne(Reservation::class);
    }

   
 
   
}
