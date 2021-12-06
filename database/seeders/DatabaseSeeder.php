<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            BookSeeder::class,
        ]);
        \App\Models\User::factory(30)->create();
        \App\Models\Book::factory(500)->create();

    }
}
