<?php

use App\Business;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create(array(
            'name' => 'Fnac',
            'description' => 'Ruil je credits in voor een cadeaubon van 20 euro.',
            'location' => 'Veldstraat 47B, 9000 Gent',
            'lat' => 51.051850,
            'lng' => 3.721850,
            'credits' => 2
        ));

        Business::create(array(
            'name' => 'Macdo',
            'description' => 'Een macdo menutje naar keuze.',
            'location' => 'St. Michielshelling, Korenmarkt 1, 9000 Gent',
            'lat' => 51.053870,
            'lng' => 3.721790,
            'credits' => 1
        ));
    }
}
