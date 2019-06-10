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

Route::group(['middleware' => ['web', 'admin'], 'prefix' => $locale . '/admin'], function() {
    //Qas
    Route::GET('qnas', 'UiStacks\Qas\Controllers\QAsController@index');
    Route::GET('qnas/create', 'UiStacks\Qas\Controllers\QAsController@create');
    Route::POST('qnas', 'UiStacks\Qas\Controllers\QAsController@store');
    Route::GET('qnas/{id}/edit', 'UiStacks\Qas\Controllers\QAsController@edit');
    Route::PATCH('qnas/{id}', 'UiStacks\Qas\Controllers\QAsController@update');
    Route::POST('qnas/bulk-operations', 'UiStacks\Qas\Controllers\QAsController@bulkOperations');

    //ِComments
    Route::GET('qnas/comments/{id}', 'UiStacks\Qas\Controllers\CommentsController@index');
    Route::GET('qnas/comments/{id}/create', 'UiStacks\Qas\Controllers\CommentsController@create');
    Route::POST('qnas/comments/{id}', 'UiStacks\Qas\Controllers\CommentsController@store');
    Route::GET('qnas/comments/{post_id}/{id}/edit', 'UiStacks\Qas\Controllers\CommentsController@edit');
    Route::PATCH('qnas/comments/{post_id}/{id}', 'UiStacks\Qas\Controllers\CommentsController@update');
    Route::POST('qnas/comments/bulk-operations', 'UiStacks\Qas\Controllers\CommentsController@bulkOperations');
});
