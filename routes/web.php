<?php

use App\Store;
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

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::get('logout', 'AuthController@logout');

Route::post('/enquiry', 'EnquiryController@store');
Route::get('/branches', 'StoreController@getBranch');

Route::post('/blog', 'BlogController@store');
Route::put('/blog', 'BlogController@update');
Route::delete('/blog/{id}', 'BlogController@delete');
Route::get('/blog/{id}', 'BlogController@get');

Route::get('/blog/as-promotion/{id}/{column}', 'BlogController@asPromotion');
Route::get('/blog/set-promotion/{id}/{state}', 'BlogController@setPromotion');

Route::post('/background', 'BackgroundController@store');
Route::get('/background/delete/{id}', 'BackgroundController@delete');
Route::get('/background/set/{id}', 'BackgroundController@set');




// Desktop version pages routes
Route::group(['prefix' => '/'], function () {

    Route::get('/', function () {
        return view('home');
    });
    Route::get('/branch-location', 'StoreController@branchLocation');
    Route::get('/rentwarehouse', 'StoreController@showRentwareHouse');

    Route::get('/contact', function () {
        return view('contact');
    });

    Route::get('/joinus', function () {
        return view('joinus');
    });

    Route::get('/about', function () {
        return view('aboutus');
    });

    Route::get('/calc', function () {
        return view('calculator');
    });

    Route::get('/faq', function () {
        return view('faq');
    });

    Route::get('/lastnews', function () {
        return view('lastnews');
    });

    Route::get('/news/{id}', 'BlogController@show');

    Route::get('/disclaimer', function(){
        return view('disclaimer');
    });

    Route::get('/login', 'AuthController@loginPage');
    Route::get('/register', 'AuthController@registerPage');
    Route::get('/forgetpwd', 'AuthController@forgetPwdPage');

    Route::group(['middleware' => ['user']], function () {
        //
        Route::get('/account', function () {
            return view('account.accountinfo');
        });

        Route::get('/chatlist', function () {
            return view('account.chatlist');
        });

        // Route::get('/chatroom', function () {
        //     return view('account.chatroom');
        // });
        Route::get('/chatroom/{id?}', ['as' => 'chatroom.show', 'uses' => 'MessagesController@show']);
        
        Route::post('/messages', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    });
});

Route::put('/messages/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);


//Backend 
Route::group(['prefix' => '/backend', 'as' => 'backend'], function () {

    Route::post('login', 'AuthController@adminLogin');

    Route::get('/login', function () {
        return view('backend.login');
    });

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/', function(){
            return redirect('/backend/enquiries');
        });
        Route::get('/enquiries', 'EnquiryController@index');
        Route::get('/enquiries/export', 'EnquiryController@export');
        Route::get('/members', 'AuthController@index');
        Route::get('/member/{id}', 'AuthController@get');
        Route::get('/members/export', 'AuthController@export');
        Route::put('/member', 'AuthController@updateByAdmin');
        Route::get('/pages', function () {
            return view('backend.pages');
        });
        Route::get('/messages', function () {
            return view('backend.messages');
        });
        Route::get('/chatroom/{id?}', 'MessagesController@showAdminRoom');
        Route::post('/broadcast', 'MessagesController@broadcast');
        Route::get('/accept-enquiry', 'EnquiryController@accept');
        Route::get('/store/{id?}', 'StoreController@show');
        Route::post('/store', 'StoreController@store');
        Route::put('/store', 'StoreController@update');
        Route::delete('/store/{id}', 'StoreController@delete');
    });
});


Route::group(['prefix' => 'messages'], function () {
    //    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    //   Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    //   Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    //   Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    //  Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});
