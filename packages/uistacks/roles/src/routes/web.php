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
	// Roles
	Route::GET('roles', 'Uistacks\Roles\Controllers\RolesController@index');
	Route::GET('roles/create', 'Uistacks\Roles\Controllers\RolesController@create');
	Route::POST('roles', 'Uistacks\Roles\Controllers\RolesController@store');
	Route::GET('roles/{id}/edit', 'Uistacks\Roles\Controllers\RolesController@edit');
	Route::PATCH('roles/{id}', 'Uistacks\Roles\Controllers\RolesController@update');
	Route::POST('roles/bulk-operations', 'Uistacks\Roles\Controllers\RolesController@bulkOperations');

});