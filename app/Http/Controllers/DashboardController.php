<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = Booking::whereHas('approvals', function ($query) {
            return $query->where('user_id', auth()->user()->id)->where('is_approved', false);
        })->get();

        return view('dashboard.index', [
            'bookings' => $bookings,
        ]);
    }
}
