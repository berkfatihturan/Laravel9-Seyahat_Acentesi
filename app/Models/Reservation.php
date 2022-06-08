<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(Reservation::class);
    }

    public function packages(){
        return $this->belongsTo(Package::class);
    }


}
