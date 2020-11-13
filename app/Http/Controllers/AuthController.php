<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $http = new Client();
        $response = $http->post('http://api.wecreation.be/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '2',
                'client_secret' => 'GmQ5Byhvd1icwNUpWW7itbghgFZovyIDuGlBftDk',
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
