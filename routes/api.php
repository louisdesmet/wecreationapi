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

Route::resource('/events', 'EventController');
Route::resource('/activities', 'ActivityController');
Route::resource('/businesses', 'BusinessController');

Route::group(['middleware' => ['auth:api']], function () {
    Route::resource('/projects', 'ProjectController');
    Route::resource('/messages', 'MessageController');
    Route::resource('/products', 'ProductController');
    Route::resource('/skills', 'SkillController');
    Route::resource('/orders', 'OrderController');
    Route::post('/subscribe', 'GeneralController@subscribe');
    Route::post('/subscribe-skill', 'GeneralController@subscribeSkill');
    Route::post('/accept', 'GeneralController@accept');
    Route::post('/present', 'GeneralController@present');
    Route::post('/trade', 'GeneralController@trade');
    Route::post('/verify', 'GeneralController@verify');
    Route::post('/verify-order', 'GeneralController@verifyOrder');
    Route::post('/users/editdata', 'UserController@editdata');
    Route::resource('/users', 'UserController');
    Route::resource('/groups', 'GroupController');
});