<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timeNow = Carbon::now();
        $twoYearAgo = Carbon::now()->subYears(2);

        do {
            Booking::factory()->create([
                'driver_id' => mt_rand(1, 20),
                'car_id' => mt_rand(1, 20),
                'is_done' => true,
                'operation_date' => $twoYearAgo->addDay(mt_rand(0, 4)),
            ]);
        } while ($timeNow > $twoYearAgo);
    }
}
