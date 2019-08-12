<?php

use Illuminate\Http\Request;
use App\Address;
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
Route::get('addresses', 'AddressController@index');
 
Route::get('addresses/{address}', 'AddressController@show');

Route::get('addresses/city/{city}', 'AddressController@showCity');
 
Route::post('addresses','AddressController@store');
 
Route::put('addresses/{address}','AddressController@update');
 
Route::delete('addresses/{address}', 'AddressController@delete');

Route::get('clients', 'ClientsController@index');
 
Route::get('clients/{client}', 'ClientsController@show');
 
Route::post('clients','ClientsController@store');
 
Route::put('clients/{client}','ClientsController@update');
 
Route::delete('clients/{client}', 'ClientsController@delete');

Route::get('tariffs', 'TariffsController@index');

Route::get('tariffs/deliveryDays/{id}', 'TariffsController@getDeliveryDays');
 
Route::get('tariffs/{tariff}', 'TariffsController@show');
 
Route::post('tariffs','TariffsController@store');
 
Route::put('tariffs/{tariff}','TariffsController@update');
 
Route::delete('tariffs/{tariff}', 'TariffsController@delete');

Route::get('orders', 'OrdersController@index');
 
Route::get('orders/{order}', 'OrdersController@show');
 
Route::post('orders','OrdersController@store');
 
Route::put('orders/{order}','OrdersController@update');
 
Route::delete('orders/{order}', 'OrdersController@delete');

Route::get('secondTask/bigChek', 'SecondTaskController@getBigCheck');

Route::get('secondTask/getOrderOffset3', 'SecondTaskController@getOrderOffset3');

Route::get('secondTask/getOrderOffset3After1000', 'SecondTaskController@getOrderOffset3After1000');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
