<?php

use Illuminate\Http\Request;
use App\Http\Requests\TransferRequest;
use App\Http\Resources\User_Balance;


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

//request input: balance, balance_achieve, type
Route::put('/transfer/{id}/{penerima}', 'TransferController@Transfer');
