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
    // Countries
    Route::GET('countries', 'Uistacks\Locations\Controllers\CountriesController@index');
    Route::GET('countries/create', 'Uistacks\Locations\Controllers\CountriesController@create');
    Route::POST('countries', 'Uistacks\Locations\Controllers\CountriesController@store');
    Route::GET('countries/{id}/edit', 'Uistacks\Locations\Controllers\CountriesController@edit');
    Route::PATCH('countries/{id}', 'Uistacks\Locations\Controllers\CountriesController@update');
    Route::POST('countries/bulk-operations', 'Uistacks\Locations\Controllers\CountriesController@bulkOperations');

	// States
	Route::GET('states', 'Uistacks\Locations\Controllers\StatesController@index');
	Route::GET('states/create', 'Uistacks\Locations\Controllers\StatesController@create');
	Route::POST('states', 'Uistacks\Locations\Controllers\StatesController@store');
	Route::GET('states/{id}/edit', 'Uistacks\Locations\Controllers\StatesController@edit');
	Route::PATCH('states/{id}', 'Uistacks\Locations\Controllers\StatesController@update');
	Route::POST('states/bulk-operations', 'Uistacks\Locations\Controllers\StatesController@bulkOperations');

    // ِCities
    Route::GET('cities', 'Uistacks\Locations\Controllers\CitiesController@index');
    Route::GET('cities/create', 'Uistacks\Locations\Controllers\CitiesController@create');
    Route::POST('cities', 'Uistacks\Locations\Controllers\CitiesController@store');
    Route::GET('cities/{id}/edit', 'Uistacks\Locations\Controllers\CitiesController@edit');
    Route::PATCH('cities/{id}', 'Uistacks\Locations\Controllers\CitiesController@update');
    Route::POST('cities/bulk-operations', 'Uistacks\Locations\Controllers\CitiesController@bulkOperations');

});