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
//login first, input: email, password
Route::post('login', 'API\UserController@login');
//register users
Route::post('register', 'API\UserController@register');


Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
    Route::post('logout', 'API\UserController@logout');

    //request input: balance, balance_achieve, type
    Route::put('/transfer/{id}/{penerima}', 'TransferController@Transfer');
//    register new user balance
    Route::post('/registerUserBalance', 'TransferController@create');
});


