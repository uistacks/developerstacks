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
$locale = \Request::segment(1);
Route::group(['middleware' => ['api'], 'prefix' => $locale.'/api/{key}'], function() {
	# Messages
	Route::GET('messages', 'UiStacks\Messages\Controllers\MessagesApiController@list');
	Route::POST('messages', 'UiStacks\Messages\Controllers\MessagesApiController@storeAd');
	Route::POST('messages/{id}/update', 'UiStacks\Messages\Controllers\MessagesApiController@updateAd');

});
