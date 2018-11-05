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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@root')->name('root');

Auth::routes();

// Route::group(['middleware' => 'auth'], function() {
//     // 邮件
//     Route::get('/email_verify_notice', 'PagesController@emailVerifyNotice')->name('email_verify_notice');
//     Route::get('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send');
//     Route::get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');

//     // 收货地址
//     // Route::resource();

// });

 // 用户验证中间件
Route::group(['middleware' => 'auth'], function() {
    Route::get('/email_verify_notice', 'PagesController@emailVerifyNotice')->name('email_verify_notice');
    Route::get('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send');
    Route::get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');
    
    // 邮箱验证成功中间件
    Route::group(['middleware' => 'email_verified'], function() {

        Route::get('user_address', 'UserAddressController@index')->name('user_address.index');
        Route::get('user_address/create', 'UserAddressController@create')->name('user_address.create');
        Route::post('user_address', 'UserAddressController@store')->name('user_address.store');
        Route::get('user_address/{user_address}', 'UserAddressController@edit')->name('user_address.edit');

    });
    
});
