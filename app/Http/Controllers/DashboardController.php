<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Booking;
use App\Models\Car;
use App\Models\CarFuelUsage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = Booking::whereHas('approvals', function ($query) {
            return $query->where('user_id', auth()->user()->id)->where('is_approved', false);
        })->get();

        $bookingsData = $this->getBookingData();
        $fuelUsagesData = $this->getFuelUsagesData();

        return view('dashboard.index', [
            'bookings' => $bookings,
            'bookingsData' => $bookingsData,
            'fuelUsagesData' => $fuelUsagesData,

        ]);
    }

    public function getBookingData()
    {
        $data = collect([]);

        $bookings = Booking::orderByDesc('operation_date')->get();
        $oneYearAgo = Carbon::now()->subYear();

        foreach ($bookings as $booking) {
            $date = Carbon::parse($booking->operation_date);
            $label = $date->format('M') . " " . $date->format('Y');

            if ($oneYearAgo > $date) {
                break;
            }

            $data->push($label);
        }

        $data = $data->countBy()->reverse();

        return $data;
    }

    public function getFuelUsagesData()
    {

        $fuelUsages = CarFuelUsage::with('fuel_type')->get();

        $fuelUsages = $fuelUsages->groupBy(function ($item) {
            return $item->fuel_type->name;
        })->map(function ($item) {
            return $item->sum('amount');
        });

        return $fuelUsages;
    }
}
