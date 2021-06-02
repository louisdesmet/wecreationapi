<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create(array(
            'name' => 'admin'
        ));
        Role::create(array(
            'name' => 'super-admin'
        ));
        Role::create(array(
            'name' => 'business'
        ));
        
    }
}
