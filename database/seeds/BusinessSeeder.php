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
            'name' => 'Ataste',
            'type' => 'business',
            'description' => 'Gezonde voeding op basis van acai',
            'location' => 'Kortrijksesteenweg 193, 9000 Gent',
            'lat' => 51.039250,
            'lng' => 3.716680
        ));

        Business::create(array(
            'name' => 'Shanti',
            'type' => 'business',
            'description' => 'Clubhuis te gent',
            'location' => 'Sint-Jacobsnieuwstraat 30, 9000 Gent',
            'lat' => 51.039250,
            'lng' => 3.729870
        ));

        Business::create(array(
            'name' => 'Yugen Kombucha',
            'type' => 'business',
            'description' => 'Super lekkere gezonde gerechten',
            'location' => 'Lousbergskaai 21, 9000 Gent',
            'lat' => 51.051420,
            'lng' => 3.736970
        ));

        Business::create(array(
            'name' => 'Visit gent',
            'type' => 'service',
            'description' => 'Organisatie te gent',
            'location' => 'Hof ten walle 1, 9000 Gent',
            'lat' => 51.059400,
            'lng' => 3.715030
        ));
    }
}
