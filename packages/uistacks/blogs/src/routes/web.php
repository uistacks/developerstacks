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
    //Blogs
    Route::GET('blogs', 'Uistacks\Blogs\Controllers\BlogsController@index');
    Route::GET('blogs/create', 'Uistacks\Blogs\Controllers\BlogsController@create');
    Route::POST('blogs', 'Uistacks\Blogs\Controllers\BlogsController@store');
    Route::GET('blogs/{id}/edit', 'Uistacks\Blogs\Controllers\BlogsController@edit');
    Route::PATCH('blogs/{id}', 'Uistacks\Blogs\Controllers\BlogsController@update');
    Route::POST('blogs/bulk-operations', 'Uistacks\Blogs\Controllers\BlogsController@bulkOperations');

    //ِComments
    Route::GET('blogs/comments/{id}', 'Uistacks\Blogs\Controllers\CommentsController@index');
    Route::GET('blogs/comments/{id}/create', 'Uistacks\Blogs\Controllers\CommentsController@create');
    Route::POST('blogs/comments/{id}', 'Uistacks\Blogs\Controllers\CommentsController@store');
    Route::GET('blogs/comments/{post_id}/{id}/edit', 'Uistacks\Blogs\Controllers\CommentsController@edit');
    Route::PATCH('blogs/comments/{post_id}/{id}', 'Uistacks\Blogs\Controllers\CommentsController@update');
    Route::POST('blogs/comments/bulk-operations', 'Uistacks\Blogs\Controllers\CommentsController@bulkOperations');
});
