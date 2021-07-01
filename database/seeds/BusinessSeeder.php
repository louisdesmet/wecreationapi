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
            'description' => 'De gezeligste living in Gent! Hier waarderen we de burning men waarden en normen. Wees welkom in het unieke concept!',
            'location' => 'Sint-Jacobsnieuwstraat 30, 9000 Gent',
            'lat' => 51.039250,
            'lng' => 3.729870
        ));

        Business::create(array(
            'name' => 'Yugen Kombucha',
            'type' => 'business',
            'description' => 'YUGEN kombucha is a fermented tea, full of powerful herbs and fresh juice. Unpasteurized, organic & low in sugar.',
            'location' => 'Lousbergskaai 21, 9000 Gent',
            'lat' => 51.051420,
            'lng' => 3.736970
        ));

        Business::create(array(
            'name' => 'Vizit gent',
            'type' => 'service',
            'description' => 'Gidsen organisatie te gent',
            'location' => 'Hof ten walle 1, 9000 Gent',
            'lat' => 51.059400,
            'lng' => 3.715030
        ));

        Business::create(array(
            'name' => 'Negenduust',
            'type' => 'business',
            'description' => 'Bij Negenduust hebben we uiteraard een hart voor Gent. Onze kledij wordt met trots gedragen door de Gentenaars en hun sympathisanten en daar zijn we heel blij om. Onze bedoeling is om mensen samen te brengen en hen een identiteit te bieden om op die manier de sociale cohesie in Gent te bevorderen. Naar die identiteit was nood. De subculturen van weleer zijn zo goed als uitgestorven en wij bieden enthousiast een alternatief team om deel van uit te maken. Een community dat staat voor respect voor elkaar en liefde voor Gent. Niet enkel voor mensen van een bepaalde politieke strekking, met bepaalde afkomst, die van voetbal houden of naar een bepaalde soort muziek luisteren. Een merk voor iedereen dus!',
            'location' => 'Lousbergskaai 21, 9000 Gent',
            'lat' => 51.051420,
            'lng' => 3.736970
        ));
    }
}
