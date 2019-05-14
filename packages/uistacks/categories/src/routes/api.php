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
	# Categories
	Route::GET('categories', 'Uistacks\Categories\Controllers\CategoriesApiController@list');
	Route::POST('categories', 'Uistacks\Categories\Controllers\CategoriesApiController@storeCategory');
	Route::POST('categories/{id}/update', 'Uistacks\Categories\Controllers\CategoriesApiController@updateCategory');

});
