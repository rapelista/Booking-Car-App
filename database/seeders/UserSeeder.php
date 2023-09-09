<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'name' => 'Admin',
            'username' => 'admin',
            'password' => 'password'
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Director',
            'username' => 'director',
            'password' => 'password'
        ]);

        User::create([
            'role_id' => 3,
            'name' => 'Manager',
            'username' => 'manager',
            'password' => 'password'
        ]);

        User::create([
            'role_id' => 4,
            'name' => 'Supervisor',
            'username' => 'supervisor',
            'password' => 'password'
        ]);

        User::factory(10)->create();
    }
}
