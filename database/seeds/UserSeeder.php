<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name'              => 'Louis De Smet',
            'email'             => 'info@louis.be',
            'password'          => Hash::make('kankerjood'),
            'credits'           => 4,
            'email_verified_at' => '2021-05-04 15:50:45'
        ));
    
        User::create(array(
            'name'          => 'Christophe Verote',
            'email'         => 'info@christophe.be',
            'password'      => Hash::make('kankerjood'),
            'credits'       => 8
        ));
    
        User::create(array(
            'name'          => 'Jolien De Waele',
            'email'         => 'info@jolien.be',
            'password'      => Hash::make('kankerjood'),
            'credits'       => 2
        ));
    }
}
