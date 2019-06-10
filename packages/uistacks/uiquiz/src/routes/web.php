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
    //Topics
    Route::GET('topics', 'UiStacks\Uiquiz\Controllers\TopicsController@index');
    Route::GET('topics/create', 'UiStacks\Uiquiz\Controllers\TopicsController@create');
    Route::POST('topics', 'UiStacks\Uiquiz\Controllers\TopicsController@store');
    Route::GET('topics/{id}/edit', 'UiStacks\Uiquiz\Controllers\TopicsController@edit');
    Route::PATCH('topics/{id}', 'UiStacks\Uiquiz\Controllers\TopicsController@update');
    Route::POST('topics/bulk-operations', 'UiStacks\Uiquiz\Controllers\TopicsController@bulkOperations');
    //Questions
    Route::GET('questions', 'UiStacks\Uiquiz\Controllers\QuestionsController@index');
    Route::GET('questions/create', 'UiStacks\Uiquiz\Controllers\QuestionsController@create');
    Route::POST('questions', 'UiStacks\Uiquiz\Controllers\QuestionsController@store');
    Route::GET('questions/{id}/edit', 'UiStacks\Uiquiz\Controllers\QuestionsController@edit');
    Route::PATCH('questions/{id}', 'UiStacks\Uiquiz\Controllers\QuestionsController@update');
    Route::POST('questions/bulk-operations', 'UiStacks\Uiquiz\Controllers\QuestionsController@bulkOperations');
    //Questions Options
    Route::GET('questions-options', 'UiStacks\Uiquiz\Controllers\QuestionsOptionsController@index');
    Route::GET('questions-options/create', 'UiStacks\Uiquiz\Controllers\QuestionsOptionsController@create');
    Route::POST('questions-options', 'UiStacks\Uiquiz\Controllers\QuestionsOptionsController@store');
    Route::GET('questions-options/{id}/edit', 'UiStacks\Uiquiz\Controllers\QuestionsOptionsController@edit');
    Route::PATCH('questions-options/{id}', 'UiStacks\Uiquiz\Controllers\QuestionsOptionsController@update');
    Route::POST('questions-options/bulk-operations', 'UiStacks\Uiquiz\Controllers\QuestionsOptionsController@bulkOperations');
    //Uiquiz
    
    Route::GET('quizzes', 'UiStacks\Uiquiz\Controllers\UiquizController@index');
    Route::GET('quizzes/create', 'UiStacks\Uiquiz\Controllers\UiquizController@create');
    Route::POST('quizzes', 'UiStacks\Uiquiz\Controllers\UiquizController@store');
    Route::GET('quizzes/{id}/edit', 'UiStacks\Uiquiz\Controllers\UiquizController@edit');
    Route::PATCH('quizzes/{id}', 'UiStacks\Uiquiz\Controllers\UiquizController@update');
    Route::POST('quizzes/bulk-operations', 'UiStacks\Uiquiz\Controllers\UiquizController@bulkOperations');

    //get all topics section
    Route::get('topic-section/{id}', 'UiStacks\Uiquiz\Controllers\UiquizController@topicSection');
});
