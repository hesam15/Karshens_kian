<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cars;
use App\Models\Booking;
use App\Models\Reports;
use App\Models\Customer;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Helpers\PersianHelper;
use Hekmatinasser\Verta\Facades\Verta;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Booking::todayBookings();
        // Get counts for stats cards
        $customersCount = Customer::count();
        $todayBookings = Booking::whereDate('date', $today)->count();
        $reportsCount = Reports::count();

        // Get recent bookings
        $recentBookings = Booking::with('customer')
            ->orderBy('date', 'desc')
            ->orderBy('time_slot', 'desc')
            ->take(5)
            ->get()
            ->map(function($booking) {
                $booking->date = Jalalian::fromCarbon(Carbon::parse($booking->date))->format('Y/m/d');
                return $booking;
            });

        return view('dashboard', compact(
            'customersCount',
            'todayBookings',
            'reportsCount',
            'recentBookings'
        ));
    }
}