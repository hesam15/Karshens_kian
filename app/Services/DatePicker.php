<?php
namespace App\Services;

use App\Models\Booking;
use Morilog\Jalali\Jalalian;
use App\Helpers\PersianHelper;

    use Psl\Dict\flatten;
    use Illuminate\Http\Request;

    class DatePicker {
        public function getAvailableTimes(Request $request)
        {
            $date = PersianHelper::convertPersianToEnglish($request->date);
            $date = Jalalian::fromFormat('Y/m/d', $date)->toCarbon()->format('Y-m-d');
                        
            $times = [8 , 17];

            $allTimes = $this->allTimes($times);
    
            $bookedTimes = Booking::where('date', $date)
                                ->pluck('time_slot')
                                ->toArray();
                
            if(empty($bookedTimes)){
                $availableTimes = $allTimes;
            }
            else{
                $availableTimes = array_diff($allTimes, $bookedTimes);
            }
                    
            return response()->json([
                'available' => array_values($availableTimes),
                ...(count($bookedTimes) > 0 ? ['booked' => array_values($bookedTimes)] : [])
            ]);     
        }

        public function allTimes($times){
            $allTimes = [];
            $times = range($times[0], $times[1]);
            foreach($times as $time){
                $allTimes[] = $time.":00";
                $allTimes[] = $time.":30";
            }

            return $allTimes;
        }
    }