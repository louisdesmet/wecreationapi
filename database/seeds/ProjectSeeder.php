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
            'name'          => 'Collectief verhalen',
            'description'         => 'Wij zijn een Gents kunstcollectief waarbij onze missie en visie verbinden, creëren en Collectief evolueren is.',
            'credits'      => 120,
            'leader_id' => 2
        ));

        Project::create(array(
            'name'          => 'De recensent van Gent',
            'description'         => 'Een rasechte Gentenaar gaat rond in Gent om alles en iedereen te recenseren en in beeld te brengen! Dit op een ludieke manier met als doel Gent in kaaart te brengen en af en goe pintje recenseren',
            'credits'      => 472,
            'leader_id' => 2
        ));

        Project::create(array(
            'name'          => 'Wens mens',
            'description'         => 'We zijn optimistische wereldverbeteraars, we gaan aan de slag door onbekende mensen aan te spreken en te vragen wat hun grootste wens is. Pas op wat je wenst, want met improvisatie, muzikale begeleiding, dans en theater laten we elke wens op één of andere manier uitkomen. Dus wat is jouw wens',
            'credits'      => 312,
            'leader_id' => 2
        ));

        Project::create(array(
            'name'          => 'Klimoaten',
            'description'         => 'Dit epische duo van klimaatactivisten beroerde ettelijke grasperken, binnentuintjes en geveltuintjes om dienen boel nekeer goe te bevruchten en bevochtigen met verse zaden en knollen. Et Zoad van ne Klimoat kan geen kwoad!',
            'credits'      => 30,
            'leader_id' => 2
        ));

        Project::create(array(
            'name'          => 'Covitesse 6',
            'description'         => 'Covitesse 6 is intussen zo’n uitgebreid project, dat het niet meer in twee zinnen samen te vatten is. Het oorspronkelijke idee van een belcentrale voor eenzame mensen is geëxplodeerd. Meer dan 200 Gentse artiesten zijn intussen betrokken bij het project en via de stad, enkele culturele organisaties en zelfs enkele sponsorende bedrijven is 150.000 euro ter beschikking gesteld om hen te vergoeden.',
            'credits'      => 106,
            'leader_id' => 2
        ));

        Project::create(array(
            'name'          => 'Silent disco tocht',
            'description'         => 'Van juni tot en met augustus 2021 willen we 4.000 mensen op een coronaveilige manier samenbrengen in de Gentse binnenstad d.m.v. stadswandelingen om zo de geschiedenis van Gent te vertellen en verbinding te creëren.',
            'credits'      => 217,
            'leader_id' => 2
        ));

        Project::create(array(
            'name'          => 'De kleine cervantes',
            'description'         => 'Jeugdliteratuurprijs, De Kleine Cervantes brengt Gentse jongeren school- en netoverstijgend samen met literatuur als aanleiding. Elk jaar gaan Gentse leerlingen uit de eerste graad van het middelbaar onderwijs aan de slag met een shortlist van geselecteerde boeken in creatieve workshops en debatten, om vervolgens een winnaar te kiezen.',
            'credits'      => 12,
            'leader_id' => 2
        ));

        Project::create(array(
            'name'          => "Let's save food",
            'description'         => "Let's Save Food! wil op een consequent duurzame manier voedselverlies voorkomen. Door lokaal voedseloverschotten te verzamelen en te verdelen, strijden we tegen de klimaatwijziging, tegen armoede en vóór meer sociale verbinding.",
            'credits'      => 500,
            'leader_id' => 2
        ));
    }
}
