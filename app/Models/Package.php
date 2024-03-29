<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    #many to one
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function images(){
        return $this->hasMany(Image::class,'package_id');
    }

    public function slider(){
        return $this->hasMany(Slider::class);
    }

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
}
