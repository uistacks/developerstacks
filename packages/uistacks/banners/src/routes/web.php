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
//control language start here
$locale = \Request::segment(1);
//control language start here
Route::group(['middleware' => ['web', 'admin'], 'prefix' => $locale . '/admin'], function() {
	//Banners
	Route::GET('banners', 'Uistacks\Banners\Controllers\BannersController@index');
	Route::GET('banners/create', 'Uistacks\Banners\Controllers\BannersController@create');
	Route::POST('banners', 'Uistacks\Banners\Controllers\BannersController@store');
	Route::GET('banners/{id}/edit', 'Uistacks\Banners\Controllers\BannersController@edit');
	Route::PATCH('banners/{id}', 'Uistacks\Banners\Controllers\BannersController@update');
	Route::POST('banners/bulk-operations', 'Uistacks\Banners\Controllers\BannersController@bulkOperations');
});