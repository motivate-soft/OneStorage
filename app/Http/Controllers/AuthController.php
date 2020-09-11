<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
     /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials, true)) {
            // Authentication passed...
            return redirect()->intended();
        }
        return response('login failed');
    }

    public function loginPage()
    {
        if(Auth::check()){
            return redirect()->intended();
        }
        return view('account.login');
    }

    public function register(Request $request)
    {
        $user = new User;
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $profile = new Profile;
        $profile->gender = $request->gender;
        $profile->birthday = $request->year.'/'.$request->month.'/'.$request->day;
        $profile->area = isset($request->area) ? $request->area : '';
        $profile->place = isset($request->place) ? $request->place : '';
        $profile->address_line1 = isset($request->addr1) ? $request->addr1 : '';
        $profile->address_line2 = isset($request->addr2) ? $request->addr2 : '';
        $profile->contact_method = isset($request->contactMethod) ? $request->contacatMethod : '';
        $profile->is_existing_customer = isset($request->isCustomer) ? (Boolean)$request->isCustomer : false;
        $profile->is_soundwill_member = isset($request->isMember) ? (Boolean)$request->isMember : false;
        $profile->branch_id = isset($request->branch) ? $request->branch : 0;
        $profile->user_id = $user->id;
        $profile->save();

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
