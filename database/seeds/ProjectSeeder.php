<?php

use App\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create(array(
            'name'          => 'Wensen vervullen',
            'description'         => 'Op 3 oktober plant de WensMens zijn 14e wenstocht doorheen de Gentse binnenstad. We vragen naar de
            wensen van wildvreemden en trachten samen als team hun dromen waar te maken. Door de Covid-19
            maatregelen zijn de plaatsen beperkt. Het maximaal aantal deelnemers is 10. Op 20 september briefen
            we alle geïnteresseerden over het project',
            'credits'      => 20,
            'leader_id' => 1
        ));

        Project::create(array(
            'name'          => 'Decorbouw',
            'description'         => 'Opbouw van het decor van de gentse feesten in het baudelo park.',
            'credits'      => 10,
            'leader_id' => 1
        ));
    }
}
