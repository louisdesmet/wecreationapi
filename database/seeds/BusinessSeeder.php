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
            'description' => 'Acai Juice Bowl',
            'location' => 'Kortrijksesteenweg 193, 9000 Gent',
            'lat' => 51.039250,
            'lng' => 3.716680,
            'credits' => 1
        ));

        Business::create(array(
            'name' => 'Shanti',
            'type' => 'business',
            'description' => 'Drank kaart Shanti Ter waarde van 10 euro',
            'location' => 'Sint-Jacobsnieuwstraat 30, 9000 Gent',
            'lat' => 51.039250,
            'lng' => 3.729870,
            'credits' => 1
        ));

        Business::create(array(
            'name' => 'Yugen Kombucha',
            'type' => 'business',
            'description' => 'Yugen gift bag',
            'location' => 'Lousbergskaai 21, 9000 Gent',
            'lat' => 51.051420,
            'lng' => 3.736970,
            'credits' => 5
        ));

        Business::create(array(
            'name' => 'Visit gent',
            'type' => 'service',
            'description' => 'Huur zaal',
            'location' => 'Hof ten walle 1, 9000 Gent',
            'lat' => 51.059400,
            'lng' => 3.715030,
            'credits' => 10
        ));
    }
}
