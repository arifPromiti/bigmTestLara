<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['division_id' => 1,'district_name' => 'Dhaka'],
            ['division_id' => 1,'district_name' => 'Gazipur'],
            ['division_id' => 2,'district_name' => 'Sirajgonj'],
            ['division_id' => 2,'district_name' => 'Rajshahi'],
            ['division_id' => 7,'district_name' => 'Dinajpur'],
            ['division_id' => 7,'district_name' => 'Rangpur'],
            ['division_id' => 3,'district_name' => 'Sylhet'],
            ['division_id' => 5,'district_name' => 'Khulna'],
            ['division_id' => 4,'district_name' => 'Chattogram'],
            ['division_id' => 4,'district_name' => 'coxs bazar'],
            ['division_id' => 6,'district_name' => 'Barisal'],
        ];
        DB::table('districts')->insert($data);
    }
}
