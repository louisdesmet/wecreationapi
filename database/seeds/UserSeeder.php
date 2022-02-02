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
            'icon'              => 'faMugHot',
            'password'          => Hash::make('kankerjood'),
            'credits'           => 4,
            'email_verified_at' => '2021-05-04 15:50:45'
        ));
    
        User::create(array(
            'name'          => 'Ian Ghysels',
            'email'         => 'ian@collectiefverhalen.be',
            'icon'          => 'faBowlingBall',
            'password'      => Hash::make('kous5932'),
            'credits'       => 8,
            'email_verified_at' => '2021-05-04 15:50:45'
        ));
        
    }
}
