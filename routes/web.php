<?php

use Illuminate\Support\Facades\Route;

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

// Common routes
Route::get('/branches', 'StoreController@getBranch');
Route::put('/messages/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);


// User pages routes
Route::group(['prefix' => '/'], function () {
    Route::view('/', 'home');
    Route::view('/contact', 'contact');
    Route::view('/joinus', 'joinus');
    Route::view('/about', 'aboutus');
    Route::view('/calc', 'calculator');
    Route::view('/faq', 'faq');
    Route::view('/lastnews', 'lastnews');
    Route::view('/disclaimer', 'disclaimer');
    Route::get('/branch-location', 'StoreController@branchLocation');
    Route::get('/rentwarehouse', 'StoreController@showRentwareHouse');
    Route::get('/calc/share', 'StoreController@shareCalcPage');
    Route::get('/news/{id}', 'BlogController@show');

    Route::get('/login', 'AuthController@loginPage')->name('login');
    Route::get('/register', 'AuthController@registerPage');
    Route::get('/forgot-password', 'AuthController@forgotPwdPage')->middleware(['guest'])->name('password.request');
    Route::get('/reset-password/{token}', function ($token) {
        return view('account.reset-password', ['token' => $token]);
    })->middleware(['guest'])->name('password.reset');

    Route::post('/enquiry', ['as' => 'enquiries.store', 'uses' => 'EnquiryController@store']);

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('forgot-password', 'AuthController@forgotPwd')->middleware(['guest'])->name('password.email');
    Route::post('reset-password', 'AuthController@resetPwd')->middleware(['guest'])->name('password.update');
    Route::get('logout', 'AuthController@logout');

    Route::group(['middleware' => ['user']], function () {
        Route::view('/account', 'account.accountinfo');
        Route::view('/chatlist', 'account.chatlist');

        Route::post('/account/update', 'AuthController@update');
        Route::get('/chatroom/{id?}', ['as' => 'chatroom.show', 'uses' => 'MessagesController@show']);
        Route::post('/messages', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    });
});

//Backend
Route::group(['prefix' => '/backend', 'as' => 'backend.'], function () {
    Route::post('login', 'AuthController@adminLogin');
    Route::view('/login', 'backend.login');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/', function(){ return redirect()->route('backend.enquiries'); });

        //--------------enquiries--------------
        Route::get('/enquiries', ['as' => 'enquiries', 'uses' => 'EnquiryController@index']);
        Route::get('/enquiries/export', ['as' => 'enquiries.export', 'uses' => 'EnquiryController@export']);
        Route::get('/enquiries/{id}/accept', ['as' => 'enquiries.accept', 'uses' => 'EnquiryController@accept']);

        //--------------members--------------
        Route::get('/members', ['as' => 'members', 'uses' => 'AuthController@index']);
        Route::get('/member/{id}', ['as' => 'members.show', 'uses' => 'AuthController@show']);
        Route::get('/members/export', ['as' => 'members.export', 'uses' => 'AuthController@export']);
        Route::post('/members/update', ['as' => 'members.update', 'uses' => 'AuthController@updateByAdmin']);

        Route::view('pages', 'backend.pages');
        Route::view('messages', 'backend.messages');

        //-------------messages--------------
        Route::get('/chatroom/{id?}', 'MessagesController@showAdminRoom');
        Route::post('/broadcast', 'MessagesController@broadcast');

        //--------------stores--------------
        Route::get('/stores/{id?}', ['as' => 'stores.show', 'uses' => 'StoreController@show']);
        Route::post('/stores', ['as' => 'stores.store', 'uses' => 'StoreController@store']);
        Route::put('/stores', ['as' => 'stores.update', 'uses' => 'StoreController@update']);
        Route::delete('/stores/{id}', ['as' => 'stores.delete', 'uses' => 'StoreController@delete']);

        //--------------newses--------------
        Route::post('/blog', ['as' => 'newses.store', 'uses' => 'BlogController@store']);
        Route::put('/blog', ['as' => 'newses.update', 'uses' => 'BlogController@update']);
        Route::delete('/blog/{id}', ['as' => 'newses.delete', 'uses' => 'BlogController@delete']);
        Route::get('/blog/{id}', ['as' => 'newses.get', 'uses' => 'BlogController@get']);
        Route::get('/blog/as-promotion/{id}/{column}', ['as' => 'newses.asPromotion', 'uses' => 'BlogController@asPromotion']);
        Route::get('/blog/set-promotion/{id}/{state}', ['as' => 'newses.setPromotion', 'uses' => 'BlogController@setPromotion']);

        //--------------background--------------
        Route::post('/background', ['as' => 'backgrounds.store', 'uses' => 'BackgroundController@store']);
        Route::get('/background/delete/{id}', ['as' => 'backgrounds.delete', 'uses' => 'BackgroundController@delete']);
        Route::get('/background/set/{id}', 'BackgroundController@set');
    });
});
