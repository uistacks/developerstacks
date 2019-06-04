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

Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function() {
    Route::get('login', 'Uistacks\Core\Controllers\AdminLoginController@getAdmin');
    Route::post('login', 'Uistacks\Core\Controllers\AdminLoginController@postAdmin');
    Route::get('logout', 'Uistacks\Core\Controllers\AdminLoginController@getAdminLogout');
});

Route::group(['middleware' => ['web'], 'prefix' => $locale.'/admin'], function() {
    Route::get('login', 'Uistacks\Core\Controllers\AdminLoginController@getAdmin');
    Route::post('login', 'Uistacks\Core\Controllers\AdminLoginController@postAdmin');
    Route::get('logout', 'Uistacks\Core\Controllers\AdminLoginController@getAdminLogout')
    ->name('admin-logout');
});

$action = 'UiStacks\Core\Controllers\DashboardController@index';
if(Config::has('uistacks.dashboard_function') && !empty(config('uistacks.dashboard_function'))){
    $action = config('uistacks.dashboard_function');
}

Route::group(['middleware' => ['web' ,'admin'], 'prefix' => $locale], function() use($action) {
    Route::get('admin', $action);
});

Route::group(['middleware' => ['web' ,'admin']], function() use($action) {
    Route::get('admin', $action);
});

Route::group(['middleware' => ['web' ,'admin'], 'prefix' => $locale.'/admin'], function() {
    Route::POST('delete-item', 'Uistacks\Core\Controllers\OperationsController@delete')
    ->name('admin-delete-item');
    Route::POST('bulk-delete-items', 'Uistacks\Core\Controllers\OperationsController@bulkDelete')
        ->name('admin-bulk-delete-items');
});