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
    //Courses
    Route::GET('courses', 'UiStacks\Tutorials\Controllers\CoursesController@index');
    Route::GET('courses/create', 'UiStacks\Tutorials\Controllers\CoursesController@create');
    Route::POST('courses', 'UiStacks\Tutorials\Controllers\CoursesController@store');
    Route::GET('courses/{id}/edit', 'UiStacks\Tutorials\Controllers\CoursesController@edit');
    Route::PATCH('courses/{id}', 'UiStacks\Tutorials\Controllers\CoursesController@update');
    Route::POST('courses/bulk-operations', 'UiStacks\Tutorials\Controllers\CoursesController@bulkOperations');
    //change course order
    Route::POST('course-reposition', 'UiStacks\Tutorials\Controllers\CoursesController@courseReposition');
    //Sections
    Route::GET('courses/sections/{id}', 'UiStacks\Tutorials\Controllers\SectionsController@index');
    Route::GET('courses/sections/{id}/create', 'UiStacks\Tutorials\Controllers\SectionsController@create');
    Route::POST('courses/sections/{id}', 'UiStacks\Tutorials\Controllers\SectionsController@store');
    Route::GET('courses/sections/{course_id}/{id}/edit', 'UiStacks\Tutorials\Controllers\SectionsController@edit');
    Route::PATCH('courses/sections/{id}', 'UiStacks\Tutorials\Controllers\SectionsController@update');
    Route::POST('sections/bulk-operations', 'UiStacks\Tutorials\Controllers\SectionsController@bulkOperations');
    //change section order
    Route::POST('section-reposition', 'UiStacks\Tutorials\Controllers\SectionsController@sectionReposition');

    //Tutorials
    Route::GET('tutorials', 'UiStacks\Tutorials\Controllers\TutorialsController@index');
    Route::GET('tutorials/create', 'UiStacks\Tutorials\Controllers\TutorialsController@create');
    Route::POST('tutorials', 'UiStacks\Tutorials\Controllers\TutorialsController@store');
    Route::GET('tutorials/{id}/edit', 'UiStacks\Tutorials\Controllers\TutorialsController@edit');
    Route::PATCH('tutorials/{id}', 'UiStacks\Tutorials\Controllers\TutorialsController@update');
    Route::POST('tutorials/bulk-operations', 'UiStacks\Tutorials\Controllers\TutorialsController@bulkOperations');

    //get all courses section
    Route::get('course-section/{id}', 'UiStacks\Tutorials\Controllers\TutorialsController@courseSection');
    //change tutorial order
    Route::POST('tutorial-reposition', 'UiStacks\Tutorials\Controllers\TutorialsController@tutorialReposition');
});