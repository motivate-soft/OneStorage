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


//testing code
Route::post('/login', function () {
    session()->put('logged_in', true);
    return redirect('/');
});

Route::get('/logout', function () {
    session()->flush();
    return redirect('/');
});

Route::post('/enquiry', 'EnquiryController@store');

Route::get('/get-branches', 'StoreController@getBranch');


// Desktop version pages routes
Route::group(['prefix' => '/'], function () {
    
    Route::get('/', function () {
        $locations = Store::groupBy('location')->select('location')->get();
        return view('desktop.home', ['locations' => $locations]);
    });
    Route::get('/branch-location', 'StoreController@branchLocation');
    Route::get('/rentwarehouse', 'StoreController@showRentwareHouse');

    Route::get('/contact', function () {
        return view('desktop.contact');
    });

    Route::get('/joinus', function () {
        return view('desktop.joinus');
    });

    Route::get('/about', function () {
        return view('desktop.aboutus');
    });

    Route::get('/calc', function () {
        return view('desktop.calculator');
    });

    Route::get('/faq', function () {
        return view('desktop.faq');
    });

    Route::get('/lastnews', function () {
        $data['users'] = [1, 2, 3, 4, 5];
        return view('desktop.lastnews', $data);
    });

    Route::get('/news', function () {
        return view('desktop.news');
    });

    Route::get('/login', function () {
        return view('desktop.account.login');
    });


    Route::get('/register', function () {
        return view('desktop.account.register');
    });

    Route::get('/forgetpwd', function () {
        return view('desktop.account.forgetpassword');
    });

    Route::get('/account', function () {
        if (session()->get('logged_in')) {
            return view('desktop.account.accountinfo');
        }
        return redirect('/login');
    });

    Route::get('/chatlist', function () {
        if (session()->get('logged_in')) {
            return view('desktop.account.chatlist');
        }
        return redirect('/login');
    });

    Route::get('/chatroom', function () {
        if (session()->get('logged_in')) {
            return view('desktop.account.chatroom');
        }
        return redirect('/login');
    });
});


// Mobile version pages routes
Route::group(['prefix' => '/mobile', 'as' => 'mobile'], function () {
    Route::get('/', function () {
        $locations = Store::groupBy('location')->select('location')->get();
        return view('mobile.home', ['locations' => $locations]);
    });
    
    Route::get('/branch-location', 'StoreController@branchLocation');
    
    Route::get('/rentwarehouse', 'StoreController@showRentwareHouse');

    Route::get('/contact', function () {
        return view('mobile.contact');
    });

    Route::get('/joinus', function () {
        return view('mobile.joinus');
    });

    Route::get('/about', function () {
        return view('mobile.aboutus');
    });

    Route::get('/calc', function () {
        return view('mobile.calculator');
    });

    Route::get('/faq', function () {
        return view('mobile.faq');
    });

    Route::get('/lastnews', function () {
        $data['users'] = [1, 2, 3, 4, 5];
        return view('mobile.lastnews', $data);
    });

    Route::get('/news', function () {
        return view('mobile.news');
    });

    Route::get('/login', function () {
        return view('mobile.account.login');
    });


    Route::get('/register', function () {
        return view('mobile.account.register');
    });

    Route::get('/forgetpwd', function () {
        return view('mobile.account.forgetpassword');
    });

    Route::get('/account', function () {
        if (session()->get('logged_in')) {
            return view('mobile.account.accountinfo');
        }
        return redirect('/login');
    });

    Route::get('/chatlist', function () {
        if (session()->get('logged_in')) {
            return view('mobile.account.chatlist');
        }
        return redirect('/login');
    });

    Route::get('/chatroom', function () {
        if (session()->get('logged_in')) {
            return view('mobile.account.chatroom');
        }
        return redirect('/login');
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

    Route::get('/accept-enquiry', 'EnquiryController@accept');
});
