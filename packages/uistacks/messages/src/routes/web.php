<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
$locale = \Request::segment(1);

Route::group(['middleware' => ['web' ,'admin'], 'prefix' => $locale.'/admin'], function() {
	//Messages
	Route::GET('messages', 'UiStacks\Messages\Controllers\MessageController@index');
	Route::GET('messages/create', 'UiStacks\Messages\Controllers\MessageController@create');
	Route::POST('messages', 'UiStacks\Messages\Controllers\MessageController@store');
	Route::GET('messages/{id}/edit', 'UiStacks\Messages\Controllers\MessageController@edit');
	Route::PATCH('messages/{id}', 'UiStacks\Messages\Controllers\MessageController@update');
	Route::POST('messages/bulk-operations', 'UiStacks\Messages\Controllers\MessageController@bulkOperations');

});