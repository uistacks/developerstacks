<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index');
// Auth
Route::get('/authentication', 'WebsiteController@authentication');

Route::get('register', 'Auth\RegisterController@register');
Route::post('register', 'Auth\RegisterController@postRegister');
Route::get('login', 'Auth\LoginController@login');
Route::post('login', 'Auth\LoginController@postLogin');

// Forgot password
Route::get('forgot-password', 'Auth\ForgotPasswordController@forgotPassword');
Route::post('forgot-password', 'Auth\ForgotPasswordController@postForgotPassword');
Route::get('reset-password/{userId}/{confirmationCode}', 'Auth\ResetPasswordController@resetPassword');
Route::post('reset-password/{userId}', 'Auth\ResetPasswordController@postResetPassword');

//email verification
Route::get('verify-user-email/{id}', 'Auth\RegisterController@verifyUserEmail');

// Pages
Route::get('pages/{pageId}', 'CmsController@showPage');
