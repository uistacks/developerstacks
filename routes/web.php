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

Route::get('/', 'HomeController@index')->name('home-page');
// Auth
Route::get('/authentication', 'WebsiteController@authentication');

Route::get('register', 'Auth\RegisterController@register')
    ->name('signup');
Route::post('register', 'Auth\RegisterController@postRegister')
    ->name('website.signup');
Route::get('login', 'Auth\LoginController@login')
    ->name('login');
Route::post('login', 'Auth\LoginController@postLogin')->name('website.login');

// Forgot password
Route::get('forgot-password', 'Auth\ForgotPasswordController@forgotPassword');
Route::post('forgot-password', 'Auth\ForgotPasswordController@postForgotPassword');
Route::get('reset-password/{userId}/{confirmationCode}', 'Auth\ResetPasswordController@resetPassword');
Route::post('reset-password/{userId}', 'Auth\ResetPasswordController@postResetPassword');

//email verification
//Route::get('verify-user-email/{id}', 'Auth\RegisterController@verifyUserEmail');
/**
 * Email Verification Route(s)
 */
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


// Pages
Route::get('pages/{pageId}', 'CmsController@showPage');
