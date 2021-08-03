<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PromotorLevel;
use DB;

class PromotorLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        DB::table('promotor_level')->truncate();

        $promotor_level = array(
            array('name' => "L1"),
            array('name' => "L2"),
            array('name' => "L3"),
            array('name' => "L4"),
            array('name' => "L5"),
        );

        foreach ($promotor_level as $promotor_level) {
            PromotorLevel::create($promotor_level);
        }
    }
}
