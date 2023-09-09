<?php

namespace Database\Seeders;

use App\Models\Approval;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApprovalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $approvers = [
            User::where('role_id', 2)->get(),
            User::where('role_id', 3)->get(),
            User::where('role_id', 4)->get()
        ];

        $bookings = Booking::all();

        foreach ($bookings as $booking) {
            foreach ($approvers as $_approvers) {
                Approval::create([
                    'user_id' => $_approvers->random()->id,
                    'booking_id' => $booking->id,
                    'is_approved' => true,
                ]);
            }
        }
    }
}
