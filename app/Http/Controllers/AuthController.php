<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
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
                'client_secret' => (App::environment('production')) ? ('ObqY0XKQygj6NTjLCZ5ZMdvqhCQCMj28leuHcm3A') : ('MO5xxqJvaDAlTMkU2wUh6GbxpsQTKtjXuFtVFjZ6'),
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
            ],
        ]);
        
        return [
            "token" => json_decode((string)$response->getBody(), true), 
            "user" => User::where('email', $request->email)->first()
        ];
    }

    public function register(Request $request) {
        User::create(array(
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'credits' => 0   
        ));
    }
    
}
