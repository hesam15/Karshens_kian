<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        "name",
        "car",
        'car_id',
        "number",
        "date",
        "created_at",
        "updated_at"
    ];
}
