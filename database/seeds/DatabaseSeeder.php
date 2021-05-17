<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(BusinessSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
