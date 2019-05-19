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
    //Members
    Route::GET('admin-users', 'Uistacks\Users\Controllers\AdminController@index');
    Route::GET('admin-users/create', 'Uistacks\Users\Controllers\AdminController@create');
    Route::POST('admin-users', 'Uistacks\Users\Controllers\AdminController@store');
    Route::GET('admin-users/{id}/edit', 'Uistacks\Users\Controllers\AdminController@edit')
        ->name('admin.edit-profile');
    Route::PATCH('admin-users/{id}', 'Uistacks\Users\Controllers\AdminController@update');
    Route::POST('admin-users/bulk-operations', 'Uistacks\Users\Controllers\AdminController@bulkOperations');

    //Members
    Route::GET('users/give-permission/{user_id}', 'Uistacks\Users\Controllers\UsersController@givePermission');
    Route::POST('users/give-permission/{user_id}', 'Uistacks\Users\Controllers\UsersController@givePermission');
    Route::GET('users/', 'Uistacks\Users\Controllers\UsersController@index');
    Route::GET('users/create', 'Uistacks\Users\Controllers\UsersController@create');
    Route::POST('users', 'Uistacks\Users\Controllers\UsersController@store');
    Route::GET('users/{id}/edit', 'Uistacks\Users\Controllers\UsersController@edit');
    Route::PATCH('users/{id}', 'Uistacks\Users\Controllers\UsersController@update');
    Route::POST('users/bulk-operations', 'Uistacks\Users\Controllers\UsersController@bulkOperations');
});
Route::GET('users/change-status', 'Uistacks\Users\Controllers\UsersController@changeStatus');

Route::get('user-country-states/{countryId}', 'Uistacks\Users\Controllers\AdminController@getCountryStates');
Route::get('user-state-cities/{stateId}', 'Uistacks\Users\Controllers\AdminController@getStateCities');