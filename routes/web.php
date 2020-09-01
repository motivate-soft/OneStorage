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


//testing code
Route::post('/signin', function () {
    session()->put('logged_in', true);
    return redirect('/');
});

Route::get('/logout', function () {
    session()->flush();
    return redirect('/');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/location', function () {
    return view('branchlocation');
});

Route::get('/rentwarehouse', function () {
    return view('rentwarehouse');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/career', function () {
    return view('career');
});

Route::get('/about', function () {
    return view('aboutus');
});

Route::get('/calc', function () {
    return view('calculator');
});

Route::get('/faqq', function () {
    return view('faq');
});

Route::get('/lastnews', function () {
    $data['users'] = [1, 2, 3, 4, 5];
    return view('lastnews', $data);
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/login', function () {
    return view('signin');
});


Route::get('/register', function () {
    return view('register');
});

Route::get('/forgetpwd', function () {
    return view('forgetpwd');
});

Route::get('/account', function () {
    if (session()->get('logged_in')) {
        return view('account.accountPage');
    }
    return redirect('/login');
});

Route::get('/chatlist', function () {
    if (session()->get('logged_in')) {
        return view('account.chatList');
    }
    return redirect('/login');
});

Route::get('/chatroom', function () {
    if (session()->get('logged_in')) {
        return view('account.chatRoom');
    }
    return redirect('/login');
});

Route::get('/booking', function () {
    return view('booking');
});


Route::get('/mobile', function () {
    return view('mobile.home');
});

Route::get('/mobile/booking', function () {
    return view('mobile/booking');
});

Route::get('/mobile/signin', function () {
    return view('mobile/signin');
});

Route::get('/mobile/register', function () {
    return view('mobile/register');
});

Route::get('/mobile/forgetPassword', function () {
    return view('mobile/forgetPassword');
});

Route::get('/mobile/accountPage', function () {
    return view('mobile/accountPage');
});

Route::get('/mobile/chatList', function () {
    return view('mobile/chatList');
});

Route::get('/mobile/chatRoom', function () {
    return view('mobile/chatRoom');
});
