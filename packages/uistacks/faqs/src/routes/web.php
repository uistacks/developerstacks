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
    //Faqs
    Route::GET('faqs', 'Uistacks\Faqs\Controllers\FaqsController@index');
    Route::GET('faqs/create', 'Uistacks\Faqs\Controllers\FaqsController@create');
    Route::POST('faqs', 'Uistacks\Faqs\Controllers\FaqsController@store');
    Route::GET('faqs/{id}/edit', 'Uistacks\Faqs\Controllers\FaqsController@edit');
    Route::PATCH('faqs/{id}', 'Uistacks\Faqs\Controllers\FaqsController@update');
    Route::POST('faqs/bulk-operations', 'Uistacks\Faqs\Controllers\FaqsController@bulkOperations');
});