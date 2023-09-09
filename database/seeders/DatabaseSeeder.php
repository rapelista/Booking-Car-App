<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CarFuelUsage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $this->call(FuelTypeSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(CarSeeder::class);

        $this->call(DriverSeeder::class);

        $this->call(BookingSeeder::class);

        $this->call(ApprovalSeeder::class);

        $this->call(CarFuelUsageSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
