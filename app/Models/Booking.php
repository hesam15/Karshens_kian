<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public static function todayBookings(){
        $today = Verta::now()->format('Y/m/d');
        return $today;
    }
}
