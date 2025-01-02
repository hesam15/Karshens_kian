<?php
namespace App\Services;

use App\Models\Booking;

    use Psl\Dict\flatten;
    use Illuminate\Http\Request;

    class DatePicker {
        public function getAvailableTimes(Request $request)
        {
            $date = $request->date;
            
            $times = [8 , 17];
            // $allTimes = allTimes($times);

    
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