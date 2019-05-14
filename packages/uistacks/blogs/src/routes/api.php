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
    # Blogs
    Route::GET('blogs', 'Uistacks\Blogs\Controllers\BlogsApiController@list');
    Route::POST('blogs', 'Uistacks\Blogs\Controllers\BlogsApiController@storeBlog');
    Route::POST('blogs/{id}/update', 'Uistacks\Blogs\Controllers\BlogsApiController@updateBlog');

    # Comments
    Route::GET('blogs/comments', 'Uistacks\Blogs\Controllers\CommentsApiController@list');
    Route::POST('blogs/comments', 'Uistacks\Blogs\Controllers\CommentsApiController@storeComment');
    Route::POST('blogs/comments/{id}/update', 'Uistacks\Blogs\Controllers\CommentsApiController@updateComment');
});