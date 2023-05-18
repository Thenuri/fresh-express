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

        $roles = [
            [
                'name' => 'Admin',
                'status' => true,
            ],
            [
                'name' => 'Employee',
                'status' => true,
            ],
            [
                'name' => 'Driver',
                'status' => true,
            ],
            [
                'name' => 'Customer',
                'status' => true,
            ],
        ];

        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }

       

        User::create([
            'name' => 'Admin',
            'role_id'=> 1,
            'email' => 'admin@freshgmail.com',
            'phone' => '1234567890',
            'address' => 'Kathmandu',
            'dob' => '1999-01-01',
            'status' => 1,
            'password' => Hash::make('password'),
        ]);
    
       $users = [
    [
        'name' => 'Customer',
        'role_id'=>4 ,
        'email' => 'customer@.com',
        'phone' => '7894561254',
        'address' => 'Kathmandu',
        'dob' => '1999-01-02',
        'status' => 1,
        'password' => Hash::make('customerpassword'),
    ],
    [
        'name' => 'Customer1',
        'role_id'=>4 ,
        'email' => 'customer1@.com',
        'phone' => '7894561274',
        'address' => 'Katllhmandu',
        'dob' => '1999-01-03',
        'status' => 1,
        'password' => Hash::make('customerpassword'),
    ],
    [
        'name' => 'Customer2',
        'role_id'=>4 ,
        'email' => 'customer2@.com',
        'phone' => '7894561254',
        'address' => 'Kathmcdandu',
        'dob' => '1999-01-04',
        'status' => 1,
        'password' => Hash::make('customerpassword'),
    ],
    [
        'name' => 'Customer3',
        'role_id'=>4 ,
        'email' => 'customer3@.com',
        'phone' => '7894561254',
        'address' => 'Kathmandu',
        'dob' => '1999-01-05',
        'status' => 1,
        'password' => Hash::make('customerpassword'),
    ],
    [
        'name' => 'Customer4',
        'role_id'=>4 ,
        'email' => 'customer4@.com',
        'phone' => '7894561254',
        'address' => 'Kathmandu',
        'dob' => '1999-01-05',
        'status' => 1,
        'password' => Hash::make('customerpassword'),
    ],
    [
        'name' => 'Employee',
        'role_id'=>2 ,
        'email' => 'employee@gr.com',
        'phone' => '7894561254',
        'address' => 'Kathmandu',
        'dob' => '1999-01-05',
        'status' => 0,
        'password' => Hash::make('customerpassword'),
    ],
];
foreach ($users as $users) {
    User::create($users);
}

        

    }
}
