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

    Route::GET('/settings/info', 'Uistacks\Settings\Controllers\SettingsController@editInformation');
    Route::POST('/settings/info', 'Uistacks\Settings\Controllers\SettingsController@updateInformation');
    Route::GET('/settings/smtp', 'Uistacks\Settings\Controllers\SettingsController@editSmtp');
    Route::POST('/settings/smtp', 'Uistacks\Settings\Controllers\SettingsController@updateSmtp');
    Route::GET('/settings/accounts', 'Uistacks\Settings\Controllers\SettingsController@editSocialAccounts');
    Route::POST('/settings/accounts', 'Uistacks\Settings\Controllers\SettingsController@updateSocialAccounts');
    Route::GET('/settings/links', 'Uistacks\Settings\Controllers\SettingsController@editAppLinks');
    Route::POST('/settings/links', 'Uistacks\Settings\Controllers\SettingsController@updateAppLinks');
    Route::GET('/settings/seo', 'Uistacks\Settings\Controllers\SettingsController@editSeo');
    Route::POST('/settings/seo', 'Uistacks\Settings\Controllers\SettingsController@updateSeo');
    Route::GET('/settings/fcm', 'Uistacks\Settings\Controllers\SettingsController@editFcm');
    Route::POST('/settings/fcm', 'Uistacks\Settings\Controllers\SettingsController@updateFcm');
    Route::GET('/settings/sms', 'Uistacks\Settings\Controllers\SettingsController@editSms');
    Route::POST('/settings/sms', 'Uistacks\Settings\Controllers\SettingsController@updateSms');
    Route::GET('/settings/mode', 'Uistacks\Settings\Controllers\SettingsController@editMaintenanceMode');
    Route::POST('/settings/mode', 'Uistacks\Settings\Controllers\SettingsController@updateMaintenanceMode');
    Route::GET('/settings/bank', 'Uistacks\Settings\Controllers\SettingsController@editBankInformation');
    Route::POST('/settings/bank', 'Uistacks\Settings\Controllers\SettingsController@updateBankInformation');

    Route::GET('/settings/insert-locations', 'Uistacks\Settings\Controllers\SettingsController@insertLocations');

});