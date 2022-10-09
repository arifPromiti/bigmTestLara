<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['division_name' => 'Dhaka'],
            ['division_name' => 'Rajshahi'],
            ['division_name' => 'Sylhet'],
            ['division_name' => 'Chattogram'],
            ['division_name' => 'Khulna'],
            ['division_name' => 'Barisal'],
            ['division_name' => 'Rangpur'],
        ];
        DB::table('divisions')->insert($data);
    }
}
