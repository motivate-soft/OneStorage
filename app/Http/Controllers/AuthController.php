<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class AuthController extends Controller
{
    public static $SEARCH_KEYS = [
        [
            'key' => 'users.created_at',
            'value' => '註冊日期'
        ],
        [
            'key' => 'users.first_name',
            'value' => 'First name'
        ],
        [
            'key' => 'users.last_name',
            'value' => 'Last name'
        ],
        [
            'key' => 'users.phone',
            'value' => 'Telephone'
        ],
        [
            'key' => 'users.email',
            'value' => 'Email'
        ],
        [
            'key' => 'profiles.address_line1',
            'value' => 'address'
        ],
        [
            'key' => 'profiles.birthday',
            'value' => 'DOB'
        ],
        // [
        //     'key' => '',
        //     'value' => 'Preferred'
        // ],
        [
            'key' => 'profiles.is_soundwill_member',
            'value' => 'Returning'
        ],
        [
            'key' => 'profiles.contact_method',
            'value' => '註冊渠道'
        ],
        [
            'key' => 'enquiry',
            'value' => '查詢'
        ],
    ];

    public function index()
    {
        //
        $key = isset($_GET['key']) ? $_GET['key'] : '';
        $value = isset($_GET['value']) ? $_GET['value'] : '';

        $members = DB::table('users')
            ->where('role', 'user')
            ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
            ->select('users.*', 'profiles.*');

        if ($key && $value) {
            $members = $members->where($key, 'like', '%' . $value . '%')->orderBy('users.id', 'desc');
        } else {
            $members = $members->orderBy('users.id', 'desc');
        }

        $members = $members->paginate(10)->appends(request()->query());
        // print_r($members);

        return view('backend.members', ['members' => $members, 'keys' => static::$SEARCH_KEYS]);
    }

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
        return redirect('login');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('first_name', 'password', 'role');

        if (Auth::attempt($credentials, true)) {
            // Authentication passed...
            return redirect('backend');
        }
        return redirect('backend/login');
    }

    public function loginPage()
    {
        if (Auth::check()) {
            return redirect()->intended();
        }
        return view('account.login');
    }

    public function registerPage()
    {
        return view('account.register');
    }

    public function forgetPwdPage()
    {
        return view('account.forgetpassword');
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
        $profile->birthday = $request->year . '/' . $request->month . '/' . $request->day;
        $profile->area = isset($request->area) ? $request->area : '';
        $profile->place = isset($request->place) ? $request->place : '';
        $profile->address_line1 = isset($request->addr1) ? $request->addr1 : '';
        $profile->address_line2 = isset($request->addr2) ? $request->addr2 : '';
        $profile->contact_method = isset($request->contactMethod) ? $request->contacatMethod : '';
        $profile->is_existing_customer = isset($request->isCustomer) ? (bool)$request->isCustomer : false;
        $profile->is_soundwill_member = isset($request->isMember) ? (bool)$request->isMember : false;
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

    public function export()
    {
        return Excel::download(new UsersExport, 'members.xlsx');
    }
}
