<?php


Route::group(['middleware' => ['web']], function() {
    Route::get('/', 'HomeController@index')->name('home-page');
    // Pages
    Route::get('pages/{pageId}', 'CmsController@showPage');

    // Auth
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
    Route::get('verify-user-email/{id}', 'Auth\RegisterController@verifyUserEmail')
        ->name('verify-user-email');
    /**
     * Email Verification Route(s)
     */
//Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
//Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

});

Route::group(['middleware' => ['web', 'auth']], function() {
// Registerd user routes
// User profile
    Route::group(['prefix' => 'user'], function () {
        Route::get('dashboard', 'UserController@index')->name('user-dashboard');
        Route::get('profile', 'UserController@profile')->name('user-profile');
        Route::get('edit-profile', 'UserController@editProfile')->name('edit-profile');
        Route::post('change-picture', 'UserController@changePicture')->middleware('auth');
        Route::get('account-setting', 'UserController@accountSetting')->name('account-setting');
        Route::post('edit-profile', 'UserController@updateProfile')->middleware('auth');
        Route::post('change-password', 'UserController@updatePassword')->middleware('auth');
    });

    Route::group(['prefix' => 'messages'], function () {
        Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
        Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
        Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
        Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
        Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
    });

    Route::post('crop-image-before-upload-using-croppie',
        ['as'=>'croppie.upload-image','uses'=>'CropImageController@uploadCropImage']
    );

    Route::get('/logout', 'UserController@logout')
    ->name('user-logout');

});
