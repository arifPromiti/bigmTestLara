<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['board_name' => 'Dhaka'],
            ['board_name' => 'Rajshahi'],
            ['board_name' => 'Cumilla'],
            ['board_name' => 'Sylhet'],
            ['board_name' => 'Chattogram'],
            ['board_name' => 'Jessore'],
            ['board_name' => 'Barisal'],
            ['board_name' => 'Dinajpur'],
            ['board_name' => 'Madrasah']
        ];
        DB::table('boards')->insert($data);
    }
}
