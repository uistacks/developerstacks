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

Route::group(['middleware' => 'web'], function() {

    Route::GET('media', 'Uistacks\Media\Controllers\MediaController@index');
    Route::GET('media/upload', 'Uistacks\Media\Controllers\MediaController@upload');
    Route::POST('media/upload', 'Uistacks\Media\Controllers\MediaController@storeFile');
    Route::GET('media/{id}/edit', 'Uistacks\Media\Controllers\MediaController@edit');
    Route::PATCH('media/{id}', 'Uistacks\Media\Controllers\MediaController@update');
    Route::GET('media/{id}/confirm-delete', 'Uistacks\Media\Controllers\MediaController@confirmDelete');
    Route::DELETE('media/{id}', 'Uistacks\Media\Controllers\MediaController@delete');

    Route::POST('upload-media-file', 'Uistacks\Media\Controllers\MediaController@storeFile');
    Route::POST('fetch-image-url', 'Uistacks\Media\Controllers\MediaController@fetchImageUrlToGallery');
});