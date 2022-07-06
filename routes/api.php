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

Route::post('reset_password_without_token', 'AuthController@validatePasswordRequest');
Route::post('reset_password_with_token', 'AuthController@resetPassword');

Route::post('events/image', 'EventController@addimage');
Route::resource('/events', 'EventController');
Route::resource('/activities', 'ActivityController');
Route::resource('/businesses', 'BusinessController');

Route::group(['middleware' => ['auth:api']], function () {
    Route::resource('/projects', 'ProjectController');

    Route::post('messages/seen', 'MessageController@seen');

    Route::resource('/messages', 'MessageController');
    Route::resource('/products', 'ProductController');
    Route::resource('/skills', 'SkillController');
    Route::resource('/orders', 'OrderController');
    Route::resource('/users', 'UserController');
    Route::resource('/groups', 'GroupController');

    Route::post('/subscribe', 'GeneralController@subscribe');
    Route::post('/subscribe-skill', 'GeneralController@subscribeSkill');
    Route::post('/accept', 'GeneralController@accept');
    Route::post('/decline', 'GeneralController@decline');
    Route::post('/present', 'GeneralController@present');
    Route::post('/not-present', 'GeneralController@notPresent');
    Route::post('/trade', 'GeneralController@trade');
    Route::post('/verify', 'GeneralController@verify');
    Route::post('/verify-order', 'GeneralController@verifyOrder');
    Route::post('/like-event', 'GeneralController@likeEvent');
    Route::post('/like-activity', 'GeneralController@likeActivity');
    Route::post('/like-business', 'GeneralController@likeBusiness');
    Route::post('/like-user', 'GeneralController@likeUser');

    Route::post('/users/editdata', 'UserController@editdata');
});