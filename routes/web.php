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

Route::get('/', function () {
    return view('home');
});

Route::get('/location', function () {
    return view('mobile.branchlocation');
});

Route::get('/rentwarehouse', function () {
    return view('rentwarehouse');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/join', function () {
    return view('joinus');
});

Route::get('/about', function () {
    return view('mobile.aboutus');
});

Route::get('/calc', function () {
    return view('mobile.calculator');
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
    return view('account.accountPage');
});

Route::get('/chatlist', function () {
    return view('account.chatList');
});

Route::get('/chatroom', function () {
    return view('account.chatRoom');
});

Route::get('/booking', function () {
    return view('booking');
});


Route::get('/mobile', function () {
    return view('mobile.home');
});

Route::get('/mobile/booking', function(){
    return view('mobile/booking');
});

Route::get('/mobile/signin', function(){
    return view('mobile/signin');
});

Route::get('/mobile/register', function(){
    return view('mobile/register');
});

Route::get('/mobile/forgetPassword', function(){
    return view('mobile/forgetPassword');
});

Route::get('/mobile/accountPage', function(){
    return view('mobile/accountPage');
});

Route::get('/mobile/chatList', function(){
    return view('mobile/chatList');
});

Route::get('/mobile/chatRoom', function(){
    return view('mobile/chatRoom');
});
