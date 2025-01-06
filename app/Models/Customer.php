<?php

namespace App\Models;

use App\Models\Cars;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['fullname', 'phone'];

    public function cars(){
        return $this->hasMany(Cars::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }  
}
