<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Approval;
use App\Models\Booking;
use App\Models\Car;
use App\Models\CarFuelUsage;
use App\Models\Driver;
use App\Models\FuelType;
use App\Models\User;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::orderByDesc('created_at')->get();

        return view('dashboard.bookings.index', [
            'bookings' => $bookings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $timeNow = Carbon::now('Asia/Jakarta')->format('Y-m-d');

        $cars = Car::where('is_available', true)->get();
        $drivers = Driver::where('is_available', true)->get();
        $approvers = User::all()->groupBy('role_id')->slice(1)->reverse();

        return view('dashboard.bookings.create', [
            'timeNow' => $timeNow,
            'cars' => $cars,
            'drivers' => $drivers,
            'approvers' => $approvers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        $booking = Booking::create([
            'driver_id' => $request->driver,
            'car_id' => $request->car,
            'operation_date' => now(),
            'notes' => $request->notes,
        ]);

        $driver = Driver::find($request->driver);
        if ($driver) {
            $driver->update(['is_available' => false]);
        }

        $car = Car::find($request->car);
        if ($car) {
            $car->update(['is_available' => false]);
        }

        foreach ($request->approver as $approver) {
            Approval::create([
                'booking_id' => $booking->id,
                'user_id' => $approver,
                'is_approved' => (auth()->user()->id == $approver),
            ]);
        }

        return redirect()->route('bookings.index')->with('success', 'Successfully make a booking!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function done(Booking $booking)
    {
        if (!$booking->is_approved_by_all()) {
            return redirect()->back();
        }

        $bookingId = $booking->id;
        $fuelTypes = FuelType::all();

        return view('dashboard.bookings.done', [
            'bookingId' => $bookingId,
            'fuelTypes' => $fuelTypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $booking->update([
            'is_done' => true,
        ]);

        $booking->car->update([
            'is_available' => true,
        ]);

        $booking->driver->update([
            'is_available' => true,
        ]);

        foreach ($request->fuel_usage as $fuelUsage) {
            CarFuelUsage::create([
                'booking_id' => $booking->id,
                'car_id' => $booking->car->id,
                'fuel_type_id' => $fuelUsage['fuel_type'],
                'amount' => $fuelUsage['amount'],
            ]);
        }

        return redirect()->route('bookings.index')->with('success', 'Booking marked as done!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approve(string $bookingId)
    {
        Approval::where('user_id', auth()->user()->id)->where('booking_id', $bookingId)->update([
            'is_approved' => true,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Booking approved!');
    }
}
