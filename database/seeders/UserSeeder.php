<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            'name' => 'Admin',
            'email' => 'admin@carticudetoate.com',
            'password' => Hash::make('secret123'),
            'role_id' => 1,
        ]);
        DB::table("users")->insert([
            'name' => 'Dummy Student',
            'email' => 'dummyuser@carticudetoate.com',
            'password' => Hash::make('secret123'),
            'role_id' => 2,
        ]);
    }
}
