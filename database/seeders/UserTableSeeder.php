<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jane Staff',
            'email' => 'mangelawuisan@student.ciputra.ac.id',
            'phone' => null, // If no phone number, set as null
            'address' => null, // If no address, set as null
            'photo' => 'no_photos_available.jpg', // Default photo
            'user_type' => 'staff', // User type as staff
            'email_verified_at' => null, // Email not verified
            'password' => Hash::make('password123'),
            'remember_token' => null, // If no remember token, set as null
            'created_at' => '2024-12-29 19:04:35', // Set created_at timestamp
            'updated_at' => '2024-12-29 19:04:35', // Set updated_at timestamp
            'status' => 'active', // Set user status as active
        ]);
    }
}
