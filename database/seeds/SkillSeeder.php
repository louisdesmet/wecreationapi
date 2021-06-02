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
            'name' => 'regie'
        ));
        Skill::create(array(
            'name' => 'montage'
        ));
        Skill::create(array(
            'name' => 'mode'
        ));
        Skill::create(array(
            'name' => 'dans'
        ));
        Skill::create(array(
            'name' => 'camera'
        ));
    }
}