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
    Route::GET('qnas', 'UiStacks\Blogs\Controllers\QAsApiController@list');
    Route::POST('qnas', 'UiStacks\Blogs\Controllers\QAsApiController@storeBlog');
    Route::POST('qnas/{id}/update', 'UiStacks\Blogs\Controllers\QAsApiController@updateBlog');

    # Comments
    Route::GET('qnas/comments', 'UiStacks\Blogs\Controllers\CommentsApiController@list');
    Route::POST('qnas/comments', 'UiStacks\Blogs\Controllers\CommentsApiController@storeComment');
    Route::POST('qnas/comments/{id}/update', 'UiStacks\Blogs\Controllers\CommentsApiController@updateComment');
});