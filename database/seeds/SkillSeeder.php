<?php

use App\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create(array(
            'name' => 'regie',
            'value' => 1,
            'icon'  => 'regie'
        ));
        Skill::create(array(
            'name' => 'montage',
            'value' => 1,
            'icon'  => 'montage'
        ));
        Skill::create(array(
            'name' => 'mode',
            'value' => 1,
            'icon'  => 'mode'
        ));
        Skill::create(array(
            'name' => 'dans',
            'value' => 1,
            'icon'  => 'dans'
        ));
        Skill::create(array(
            'name' => 'camera',
            'value' => 1,
            'icon'  => 'camera'
        ));
        Skill::create(array(
            'name' => 'administratie',
            'value' => 1,
            'icon'  => 'administratie'
        ));

        Skill::create(array(
            'name' => 'organisatie',
            'value' => 1,
            'icon'  => 'organisatie'
        ));
        Skill::create(array(
            'name' => 'werkkracht',
            'value' => 1,
            'icon'  => 'werkkracht'
        ));
        Skill::create(array(
            'name' => 'decor',
            'value' => 1,
            'icon'  => 'decor'
        ));
        Skill::create(array(
            'name' => 'kostuum',
            'value' => 1,
            'icon'  => 'kostuum'
        ));
        Skill::create(array(
            'name' => 'muzikant',
            'value' => 1,
            'icon'  => 'muzikant'
        ));
        Skill::create(array(
            'name' => 'agendaplanning',
            'value' => 1,
            'icon'  => 'agendaplanning'
        ));
        Skill::create(array(
            'name' => 'dj / producer',
            'value' => 1,
            'icon'  => 'dj'
        ));
        Skill::create(array(
            'name' => 'animatie',
            'value' => 1,
            'icon'  => 'animatie'
        ));
        Skill::create(array(
            'name' => 'tolk',
            'value' => 1,
            'icon'  => 'tolk'
        ));
        Skill::create(array(
            'name' => 'presentatie',
            'value' => 1,
            'icon'  => 'presentatie'
        ));
        Skill::create(array(
            'name' => 'social media',
            'value' => 1,
            'icon'  => 'socialmedia'
        ));
        Skill::create(array(
            'name' => 'schilderkunst',
            'value' => 1,
            'icon'  => 'schilderkunst'
        ));
        Skill::create(array(
            'name' => 'acrobatie',
            'value' => 1,
            'icon'  => 'acrobatie'
        ));
        Skill::create(array(
            'name' => 'acteur',
            'value' => 1,
            'icon'  => 'acteur'
        ));
        Skill::create(array(
            'name' => 'vakman',
            'value' => 1,
            'icon'  => 'vakman'
        )); 
        Skill::create(array(
            'name' => 'geluidstechnieker',
            'value' => 1,
            'icon'  => 'geluidstechnieker'
        ));   
        Skill::create(array(
            'name' => 'conceptbedenker',
            'value' => 1,
            'icon'  => 'conceptbedenker'
        ));
        Skill::create(array(
            'name' => 'yoga',
            'value' => 1,
            'icon'  => 'yoga'
        ));  
        Skill::create(array(
            'name' => 'projectleider',
            'value' => 1,
            'icon'  => 'projectleider'
        ));  
        Skill::create(array(
            'name' => 'horeca',
            'value' => 1,
            'icon'  => 'horeca'
        )); 

    }
}