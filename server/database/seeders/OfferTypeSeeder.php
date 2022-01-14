<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offer = [
            [
                'id' => 1,
                'offer' => 'Vendita',
                'created_at' => now()
            ],
            [
                'id' => 2,
                'offer' => 'Affitto',
                'created_at' => now()
            ],
            [
                'id' => 3,
                'offer' => 'Affitto gratuito',
                'created_at' => now()
            ]
        ];

        DB::table('offer-types')->insert(
            $offer
        );
    }
}
