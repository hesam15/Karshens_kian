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

    protected $casts = [
        'date' => 'date',
    ];

    // ارتباط با مشتری
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeForDate($query, $date)
    {
        return $query->whereDate('date', $date);
    }

    public static function isTimeSlotAvailable($date, $timeSlot)
    {
        return !self::where('date', $date)
            ->where('time_slot', $timeSlot)
            ->where('status', 'active')
            ->exists();
    }
}
