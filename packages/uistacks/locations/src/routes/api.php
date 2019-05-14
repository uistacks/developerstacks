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
    // Countries
    Route::GET('countries', 'Uistacks\Locations\Controllers\CountriesApiController@list');
    Route::POST('countries', 'Uistacks\Locations\Controllers\CountriesApiController@storeCountry');
    Route::POST('countries/{id}/update', 'Uistacks\Locations\Controllers\CountriesApiController@updateCountry');

	// Locations
	Route::GET('states', 'Uistacks\Locations\Controllers\StatesApiController@list');
	Route::POST('states', 'Uistacks\Locations\Controllers\StatesApiController@locationCategory');
	Route::POST('states/{id}/update', 'Uistacks\Locations\Controllers\StatesApiController@updateCategory');

    // Areas
    Route::GET('cities', 'Uistacks\Locations\Controllers\CitiesApiController@list');
    Route::POST('cities', 'Uistacks\Locations\Controllers\CitiesApiController@storeArea');
    Route::POST('cities/{id}/update', 'Uistacks\Locations\Controllers\CitiesApiController@updateArea');

});
