<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'car_type',
        'date',
        'time_slot',
        'status'
    ];

    // ارتباط با مشتری
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public static function isTimeSlotAvailable($date, $timeSlot)
    {
        return self::where('date', $date)
            ->where('time_slot', $timeSlot)
            ->where('status', 'active')
            ->exists();
    }
}
