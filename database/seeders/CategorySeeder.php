<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Copii',
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Fictiune',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Filozofie',
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'Istorie',
        ]);
    }
}
