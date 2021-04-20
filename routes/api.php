<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

Route::group(['middleware' => ['auth:api']], function () {

    Route::resource('/projects', 'ProjectController');
    Route::resource('/events', 'EventController');
    Route::resource('/businesses', 'BusinessController');
    Route::resource('/activities', 'ActivityController');
    Route::post('/subscribe', 'GeneralController@subscribe');
    Route::post('/accept', 'GeneralController@accept');
    Route::post('/verify', 'GeneralController@verify');
    Route::get('/users/{id}/events', 'GeneralController@events');
    Route::resource('/users', 'UserController');
});