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

Route::namespace('Auth')->prefix('auth')->group(function(){
    Route::post('login', 'LoginController@token');
});

Route::namespace('Contracts')->group(function(){
    Route::resource('contracts', 'ContractController');
});

Route::namespace('Properties')->group(function(){
    Route::get('properties/addresses', 'PropertyController@addresses');
    Route::get('properties/trashed', 'PropertyController@trashed');
    Route::put('properties/restore/{trashed_property}', 'PropertyController@restore');
    Route::resource('properties', 'PropertyController');
});


Route::namespace('WebServices')->group(function(){
    Route::get('via-cep/{cep}', 'ViaCep');
    Route::get('verify-email/{email}', 'VerifyEmail');
});
