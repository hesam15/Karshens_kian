<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cars extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'customer_id',
        'report_id',
        'image',
        'color',
        'license_plate',
    ];

    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
