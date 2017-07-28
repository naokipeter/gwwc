<?php

use Illuminate\Http\Request;

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

/*
|--------------------------------------------------------------------------
| REST API Routes
|--------------------------------------------------------------------------
*/
Route::post('register', 'Auth\RegisterController@register');
Route::post('login',    'Auth\LoginController@login');
Route::post('logout',   'Auth\LoginController@logout');
Route::group(['middleware' => 'auth:api'], function() {
    /*
    |--------------------------------------------------------------------------
    | User endpoints
    |--------------------------------------------------------------------------
    */

    Route::resource('users', 'UserController',  ['only' => [
        'index', 'show', 'update', 'destroy'
    ]]);


    /*
    |--------------------------------------------------------------------------
    | Donation endpoints
    |--------------------------------------------------------------------------
    */

    Route::resource('users.donations', 'DonationController', ['only' => [
        'index', 'show', 'store', 'update', 'destroy'
    ]]);

    /*
    |--------------------------------------------------------------------------
    | Income endpoints
    |--------------------------------------------------------------------------
    */

    Route::resource('users.incomes', 'IncomeController', ['only' => [
        'index', 'show', 'store', 'update', 'destroy'
    ]]);
});
