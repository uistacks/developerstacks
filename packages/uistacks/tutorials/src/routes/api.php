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
    //Tutorials
    Route::GET('tutorials', 'UiStacks\Tutorials\Controllers\TutorialsApiController@list');
    Route::POST('tutorials', 'UiStacks\Tutorials\Controllers\TutorialsApiController@storeBlog');
    Route::POST('tutorials/{id}/update', 'UiStacks\Tutorials\Controllers\TutorialsApiController@updateBlog');

    //Comments
    Route::GET('tutorials/comments', 'UiStacks\Tutorials\Controllers\CommentsApiController@list');
    Route::POST('tutorials/comments', 'UiStacks\Tutorials\Controllers\CommentsApiController@storeComment');
    Route::POST('tutorials/comments/{id}/update', 'UiStacks\Tutorials\Controllers\CommentsApiController@updateComment');

});