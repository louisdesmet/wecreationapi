<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Resources\User as UserRes;
use Auth;
use Illuminate\Support\Facades\App;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $environment = App::environment();
        $http = new Client();
        $response = $http->post((App::environment('production')) ? ('https://api.wecreation.be/oauth/token') : ('http://api.test/oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '2',
                'client_secret' => (App::environment('production')) ? ('bFG2HUM5AYSZKs4vDwA7rtFYtaf1TwRHU1fPz4PG') : ('35MJP5skh0ZMdWVfhbpiC12s8DOFTVEJVpdpGOEc'),
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
            ],
        ]);
        
        return [
            "token" => json_decode((string)$response->getBody(), true),
            "user" => UserRes::collection(User::with('roles')->where('email', $request->email)->get())
        ];
    }

    public function register(Request $request) {
        $icons = ['faChess', 'faAddressCard', 'faBeer', 'faBalanceScale', 'faMugHot', 'faBurn', 'faAnchor', 'faBlind', 'faBowlingBall', 
        'faRadiation', 'faBandAid', 'faBath', 'faBed', 'faBible', 'faBlender', 'faBong', 'faBox'];
        User::create(array(
            'email' => $request->email,
            'icon' => $icons[rand(0, 16)],
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'credits' => 0   
        ));
    }
    
}
