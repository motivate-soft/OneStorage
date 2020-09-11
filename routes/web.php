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
        $data['users'] = [1, 2, 3, 4, 5];
        return view('lastnews', $data);
    });

    Route::get('/news', function () {
        return view('news');
    });

    Route::get('/login', 'AuthController@loginPage');


    Route::get('/register', function () {
        return view('account.register');
    });

    Route::get('/forgetpwd', function () {
        return view('account.forgetpassword');
    });

    Route::group(['middleware' => ['auth']], function () {
        //
        Route::get('/account', function () {
            return view('account.accountinfo');
        });
    
        Route::get('/chatlist', function () {
            return view('account.chatlist');
        });
    
        Route::get('/chatroom', function () {
            return view('account.chatroom');
        });
    });

    
});


//Backend 
Route::group(['prefix' => '/backend', 'as' => 'backend'], function () {

    Route::post('/login', function () {
        // session()->put('logged_in', true);
        return redirect('/backend');
    });

    Route::get('/login', function () {
        return view('backend.login');
    });

    Route::get('/', 'EnquiryController@index');

    Route::get('/members', function () {
        return view('backend.members');
    });

    Route::get('/pages', function () {
        return view('backend.pages');
    });

    Route::get('/stores', function () {
        return view('backend.stores');
    });

    Route::get('/messages', function () {
        return view('backend.messages');
    });

    Route::get('/chatroom', function () {
        return view('backend.chatroom');
    });

    Route::get('/accept-enquiry', 'EnquiryController@accept');
});
