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
            'value' => 1.2
        ));
        Skill::create(array(
            'name' => 'montage',
            'value' => 1.4
        ));
        Skill::create(array(
            'name' => 'mode',
            'value' => 1.3
        ));
        Skill::create(array(
            'name' => 'dans',
            'value' => 1.5
        ));
        Skill::create(array(
            'name' => 'camera',
            'value' => 1.1
        ));
    }
}