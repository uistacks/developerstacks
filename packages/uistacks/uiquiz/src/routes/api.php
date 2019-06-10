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
    //Uiquiz
    Route::GET('topic', 'UiStacks\Uiquiz\Controllers\TopicsApiController@list');
    Route::POST('topic', 'UiStacks\Uiquiz\Controllers\TopicsApiController@storeBlog');
    Route::POST('topic/{id}/update', 'UiStacks\Uiquiz\Controllers\TopicsApiController@updateBlog');

    //Comments
    Route::GET('topic/comments', 'UiStacks\Uiquiz\Controllers\CommentsApiController@list');
    Route::POST('topic/comments', 'UiStacks\Uiquiz\Controllers\CommentsApiController@storeComment');
    Route::POST('topic/comments/{id}/update', 'UiStacks\Uiquiz\Controllers\CommentsApiController@updateComment');

});