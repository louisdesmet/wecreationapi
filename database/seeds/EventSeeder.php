<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create(array(
            'name' => 'Start meeting',
            'description' => 'we ontmoeten elkaar op de startmeeting',
            'location' => 'Shantiweg 156, 9000 Gent',
            'date' => '2020-09-21 06:00:00',
            'credits' => '0',
            'project_id' => 1
        ));

        $event1 = Event::create(array(
            'name' => 'Infodag',
            'description' => 'we ontmoeten elkaar op de infodag',
            'location' => 'Shantiweg 156, 9000 Gent',
            'date' => '2020-09-23 06:00:00',
            'credits' => '10',
            'project_id' => 1
        ));

        /*$event1->users()->attach([1 => ['hours' => 3], 2 => ['hours' => 3], 3 => ['hours' => 1]]);
        $event1->users()->attach([1 => ['hours' => 2], 2 => ['hours' => 1]]);*/

        $event2 = Event::create(array(
            'name' => 'Werkdag',
            'description' => 'we ontmoeten elkaar op de werkdag',
            'location' => 'Shantiweg 156, 9000 Gent',
            'date' => '2020-09-25 06:00:00',
            'credits' => '15',
            'project_id' => 1
        ));

        /*$event2->users()->attach([1 => ['hours' => 3], 2 => ['hours' => 3], 3 => ['hours' => 1]]);*/

        Event::create(array(
            'name' => 'Werkdag',
            'description' => 'we ontmoeten elkaar op de werkdag',
            'location' => 'Shantiweg 156, 9000 Gent',
            'date' => '2020-09-29 06:00:00',
            'credits' => '10',
            'project_id' => 2
        ));
    }
}
