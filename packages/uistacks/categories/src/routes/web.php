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
	//Categories
	Route::GET('categories', 'Uistacks\Categories\Controllers\CategoriesController@index');
	Route::GET('categories/create', 'Uistacks\Categories\Controllers\CategoriesController@create');
	Route::POST('categories', 'Uistacks\Categories\Controllers\CategoriesController@store');
	Route::GET('categories/{id}/edit', 'Uistacks\Categories\Controllers\CategoriesController@edit');
	Route::PATCH('categories/{id}', 'Uistacks\Categories\Controllers\CategoriesController@update');
	Route::POST('categories/bulk-operations', 'Uistacks\Categories\Controllers\CategoriesController@bulkOperations');
    // Sub-Categories
    Route::GET('categories/{id}/sub-cat', 'Uistacks\Categories\Controllers\SubCategoriesController@index');
    Route::GET('categories/{id}/sub-cat/create', 'Uistacks\Categories\Controllers\SubCategoriesController@create');
    Route::POST('categories/{id}/sub-cat', 'Uistacks\Categories\Controllers\SubCategoriesController@store');
    Route::GET('categories/{catId}/sub-cat/{id}/edit', 'Uistacks\Categories\Controllers\SubCategoriesController@edit');
    Route::PATCH('categories/{catId}/sub-cat/{id}', 'Uistacks\Categories\Controllers\SubCategoriesController@update');
    Route::POST('categories/{catId}/sub-cat/bulk-operations', 'Uistacks\Categories\Controllers\SubCategoriesController@bulkOperations');

});