<?php

use Illuminate\Database\Seeder;
use App\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create(array(
            'name' => 'Mount Average ‑ Julian Hetzel / CAMPO',
            'location' => 'Fratersplein 7, 9000 Gent',
            'date' => '2020-10-28 14:00:00',
            'lat' => 51.061610,
            'lng' => 3.723720
        ));

        Activity::create(array(
            'name' => 'Six Impossible Things Before Breakfast',
            'location' => 'Sint-Pietersnieuwstraat 23, 9000 Gent',
            'date' => '2020-10-28 16:00:00',
            'lat' => 51.053820,
            'lng' => 3.722270
        ));
    }
}
