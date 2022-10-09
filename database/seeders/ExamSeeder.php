<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['exam_name' => 'HSC'],
            ['exam_name' => 'SSC'],
            ['exam_name' => 'BSc'],
            ['exam_name' => 'MSc'],
            ['exam_name' => 'Alim'],
            ['exam_name' => 'Dakhil']
        ];
        DB::table('exams')->insert($data);
    }
}
