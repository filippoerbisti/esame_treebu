<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $land = [
            [
                'id' => 1,
                'land' => 'Argilloso',
                'created_at' => now()
            ],
            [
                'id' => 2,
                'land' => 'Sabbioso',
                'created_at' => now()
            ],
            [
                'id' => 3,
                'land' => 'Ghiaioso',
                'created_at' => now()
            ],
            [
                'id' => 4,
                'land' => 'Tufo',
                'created_at' => now()
            ]
        ];

        DB::table('land-types')->insert(
            $land
        );
    }
}
