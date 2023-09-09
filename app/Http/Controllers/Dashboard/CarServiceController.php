<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarServiceScheduleRequest;
use App\Models\Car;
use App\Models\CarServiceSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CarServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timeNow = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        $cars = Car::all();
        $schedules = CarServiceSchedule::with(['car'])->orderBy('service_date')->get();

        return view('dashboard.services.index', [
            'schedules' => $schedules,
            'timeNow' => $timeNow,
            'cars' => $cars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarServiceScheduleRequest $request)
    {
        CarServiceSchedule::create([
            'car_id' => $request->car,
            'service_date' => Carbon::createFromFormat('Y-m-d', $request->service_date)
        ]);

        return redirect()->route('services.index')->with('success', 'Service scheduled!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
