<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetectionTableData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detections = [
            ['motion_detected' => 'grab', 'level' => 'warning'],
            ['motion_detected' => 'stealing', 'level' => 'danger'],
            ['motion_detected' => 'pickpocketing', 'level' => 'normal'],
            ['motion_detected' => 'shoplifting', 'level' => 'normal'],
            ['motion_detected' => 'burglary', 'level' => 'danger'],
            ['motion_detected' => 'snatch', 'level' => 'warning'],
        ];

        foreach ($detections as $detection) {
            DB::table('detections')->insert($detection);
        }
    }
}
