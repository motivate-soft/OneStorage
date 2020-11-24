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
use Illuminate\Support\Facades\Session;

// Common routes
Route::get('/branches', 'StoreController@getBranch');
Route::put('/messages/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);

Route::get('/locale/{locale}', function($locale){
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');

// User pages routes
Route::group(['prefix' => '/'], function () {
    Route::view('/', 'home')->name('home');
    Route::view('/contact-one-storage', 'contact')->name('pages.contactUs');
    Route::view('/join-one-storage', 'joinus')->name('pages.joinUs');
    Route::view('/about-one-storage', 'aboutus')->name('pages.aboutUs');
    Route::view('/mini-storage-space-calculator', 'calculator')->name('pages.calculator');
    Route::view('/mini-storage-faq', 'faq')->name('pages.faq');
    Route::view('/mini-storage-latest-news', 'lastnews')->name('pages.lastNews');
    Route::view('/one-storage-privacy-policy-disclaimer', 'disclaimer')->name('pages.disclaimer');
    Route::get('/mini-storage-branch-location', ['as' => 'pages.branchLocation', 'uses' => 'StoreController@branchLocation']);
    Route::get('/rent-mini-storage/{id?}', ['as' => 'pages.rentWareHouse', 'uses' => 'StoreController@showRentwareHouse']);
    Route::get('/one-storage-promo-news/{id}', ['as' => 'pages.news', 'uses' => 'BlogController@show']);

    Route::get('/one-storage-login', 'AuthController@loginPage')->name('login');
    Route::get('/one-storage-register', 'AuthController@registerPage')->name('register');
    Route::get('/forgot-password', 'AuthController@forgotPwdPage')->middleware(['guest'])->name('password.request');
    Route::get('/forgot-number', 'AuthController@forgotNumPage')->middleware(['guest'])->name('number.request');
    Route::get('/reset-password/{token}', function ($token) {
        return view('account.reset-password', ['token' => $token]);
    })->middleware(['guest'])->name('password.reset');

    Route::post('/enquiry', ['as' => 'enquiries.store', 'uses' => 'EnquiryController@store']);

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::post('forgot-password', 'AuthController@forgotPwd')->middleware(['guest'])->name('password.email');
    Route::post('forgot-number', 'AuthController@forgotNum')->middleware(['guest'])->name('number.email');

    Route::post('reset-password', 'AuthController@resetPwd')->middleware(['guest'])->name('password.update');
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::group(['middleware' => ['user']], function () {
        Route::view('/account', 'account.accountinfo')->name('pages.account');
        Route::view('/chatlist', 'account.chatlist')->name('pages.chatList');

        Route::post('/account/update', ['as' => 'account.update', 'uses' => 'AuthController@update']);
        Route::get('/chatroom/{id?}', ['as' => 'pages.chatRoom', 'uses' => 'MessagesController@show']);
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
        Route::post('/stores/change-order', ['as' => 'stores.changeOrder', 'uses' => 'StoreController@changeOrder']);
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
