<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $roles = [
        //     [
        //         'name' => 'Admin',
        //         'status' => true,
        //     ],
        //     [
        //         'name' => 'Employee',
        //         'status' => true,
        //     ],
        //     [
        //         'name' => 'Driver',
        //         'status' => true,
        //     ],
        // ];

        // foreach ($roles as $role) {
        //     \App\Models\Role::create($role);
        // }

        User::create([
            'name' => 'Admin',
            'role_id'=> 1,
            'email' => 'admin@freshgmail.com',
            'phone' => '1234567890',
            'address' => 'Kathmandu',
            'dob' => '1999-01-01',
            'password' => Hash::make('adminpassword'),
        ]);

    }
}
