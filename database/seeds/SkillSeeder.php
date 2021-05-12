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
            'name' => 'Beeldende kunst'
        ));
        Skill::create(array(
            'name' => 'Boekhouding'
        ));
        Skill::create(array(
            'name' => 'Camera'
        ));
        Skill::create(array(
            'name' => 'Dans'
        ));
        Skill::create(array(
            'name' => 'Mode'
        ));
        Skill::create(array(
            'name' => 'Montage'
        ));
        Skill::create(array(
            'name' => 'Regie'
        ));
    }
}