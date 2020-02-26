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

Route::post('adduser', 'WebServicesController@store')->name('store');
Route::get('allusers', 'WebServicesController@getdata')->name('ret_data');

// Route::apiResource('books', 'WebServicesController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
