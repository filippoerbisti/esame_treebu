<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IrrigationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $irrigation = [
            [
                'id' => 1,
                'irrigation' => 'A scorrimento',
                'created_at' => now()
            ],
            [
                'id' => 2,
                'irrigation' => 'Pozzo',
                'created_at' => now()
            ],
            [
                'id' => 3,
                'irrigation' => 'Canale',
                'created_at' => now()
            ],
            [
                'id' => 4,
                'irrigation' => "Senz'acqua",
                'created_at' => now()
            ]
        ];

        DB::table('irrigation-types')->insert(
            $irrigation
        );
    }
}
