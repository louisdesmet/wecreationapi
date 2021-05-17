<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(array(
            'name' => 'Start meeting',
            'location' => 'Shantiweg 156, 9000 Gent',
            'date' => '2020-09-21 06:00:00',
            'credits' => '0',
            'project_id' => 1
        ));

        $event1 = Event::create(array(
            'name' => 'Infodag',
            'location' => 'Shantiweg 156, 9000 Gent',
            'date' => '2020-09-23 06:00:00',
            'credits' => '10',
            'project_id' => 1
        ));

        $event1->users()->attach([1 => ['hours' => 3], 2 => ['hours' => 3], 3 => ['hours' => 1]]);
        $event1->users()->attach([1 => ['hours' => 2], 2 => ['hours' => 1]]);

        $event2 = Event::create(array(
            'name' => 'Werkdag',
            'location' => 'Shantiweg 156, 9000 Gent',
            'date' => '2020-09-25 06:00:00',
            'credits' => '15',
            'project_id' => 1
        ));

        $event2->users()->attach([1 => ['hours' => 3], 2 => ['hours' => 3], 3 => ['hours' => 1]]);

        Event::create(array(
            'name' => 'Werkdag',
            'location' => 'Shantiweg 156, 9000 Gent',
            'date' => '2020-09-29 06:00:00',
            'credits' => '10',
            'project_id' => 2
        ));
    }
}
