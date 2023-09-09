<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\CarFuelUsage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarFuelUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $bookings = Booking::all();

        foreach ($bookings as $booking) {
            foreach (range(1, 10) as $_) {
                CarFuelUsage::create([
                    'booking_id' => $booking->id,
                    'car_id' => $booking->car->id,
                    'fuel_type_id' => mt_rand(1, 4),
                    'amount' => mt_rand(2, 10) * mt_rand(90, 100) / 10
                ]);
            }
        }
    }
}
