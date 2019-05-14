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
    //Pages
    Route::GET('pages', 'Uistacks\Pages\Controllers\PagesController@index');
    Route::GET('pages/dynamic', 'Uistacks\Pages\Controllers\PagesController@dynamic');
    Route::GET('pages/create', 'Uistacks\Pages\Controllers\PagesController@create');
    Route::POST('pages', 'Uistacks\Pages\Controllers\PagesController@store');
    Route::GET('pages/{id}/edit', 'Uistacks\Pages\Controllers\PagesController@edit');
    Route::PATCH('pages/{id}', 'Uistacks\Pages\Controllers\PagesController@update');
    Route::POST('pages/bulk-operations', 'Uistacks\Pages\Controllers\PagesController@bulkOperations');
});