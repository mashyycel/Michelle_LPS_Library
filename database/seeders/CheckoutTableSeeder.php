<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheckoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('checkout')->insert([
            'id_user' => 1, // User ID
            'id_book' => 10, // Book ID
            'borrow_date' => '2022-12-04', // Borrow date
            'due_date' => '2022-12-17', // Due date
            'return_date' => null, // Return date (still null)
            'status' => 'overdue', // Status of the book
            'created_at' => now(), // Current timestamp for created_at
            'updated_at' => now(), // Current timestamp for updated_at
        ]);
    }
}
