<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books') -> truncate();
        for($i = 0; $i < 100; $i += 1){
            DB::table('books') -> insert([
                'name' => 'TEST'.$i,
                'price' => random_int(100, 10000),
                'player' => 'Seeder'
            ]);
        }
    }
}
