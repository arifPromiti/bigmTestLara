<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpozilaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['district_id' => 1,'upazilla_name' => 'Airport Thana'],
            ['district_id' => 2,'upazilla_name' => 'Gazipur Shadar'],
            ['district_id' => 3,'upazilla_name' => 'Sirajgonj Shadar'],
            ['district_id' => 4,'upazilla_name' => 'Poba'],
            ['district_id' => 5,'upazilla_name' => 'Dinajpur Shadar'],
            ['district_id' => 6,'upazilla_name' => 'Rangpur Shadar'],
            ['district_id' => 7,'upazilla_name' => 'Sylhet Shadar'],
            ['district_id' => 8,'upazilla_name' => 'Khulna Shadar'],
            ['district_id' => 9,'upazilla_name' => 'Anwara'],
            ['district_id' => 10,'upazilla_name' => 'coxs bazar Shadar'],
            ['district_id' => 11,'upazilla_name' => 'Barisal Shadar'],
        ];
        DB::table('upazillas')->insert($data);
    }
}
