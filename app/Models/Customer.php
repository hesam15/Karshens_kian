<?php

namespace App\Models;

use App\Models\Cars;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['fullname', 'phone', 'date'];

    public function cars(){
        return $this->hasMany(Cars::class);
    }
}
