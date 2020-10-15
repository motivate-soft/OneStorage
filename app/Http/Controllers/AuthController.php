<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Exports\UsersExport;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;

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
        foreach($members as $member){
            $member->{"enquiries"} = Enquiry::select('id')->where('user_id', $member->user_id)->get();
        }
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
        return redirect('login')->withErrors(['error' => '電話號碼或密碼錯誤']);
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

    public function forgotPwdPage()
    {
        return view('account.forgot-password');
    }

    public function forgotPwd(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPwd(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['password' => __($status)]);
    }

    public function updateByAdmin(Request $request)
    {
        $user = User::find($request->id);
        if($user){
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->save();
            $profile = $user->profile;
            $profile->birthday = $request->year . '/' . $request->month . '/' . $request->day;
            $profile->address_line1 = isset($request->addr1) ? $request->addr1 : '';
            $profile->is_existing_customer = isset($request->isCustomer) ? $request->isCustomer == '1' : false;
            $profile->is_soundwill_member = isset($request->isMember) ? $request->isMember == '1' : false;
            $profile->save();
        }
//        return redirect('/backend/members');
        return redirect()->route('backend.members');
    }

    public function register(Request $request)
    {
        $user = new User;
        try{
            $user->setData($request);
        }catch(QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                $value = "";
                $key = "";
                echo $e->errorInfo[2];
                sscanf($e->errorInfo[2], "Duplicate entry %s for key 'users.users_%s_unique'", $value, $key);
                $key = explode("_", $key)[0];
                if($key != 'phone' && $key = 'email'){
                    $key = 'other';
                }

                $duplicationMsg = [
                    'phone' =>  '此電話號碼已被使用',
                    'email' => '此電話號碼已被使用',
                    'other' => 'error'
                ];

                return response([
                    'state' =>  'error',
                    'type' => 'duplication',
                    'key'   => $key,
                    'message' => $duplicationMsg[$key]
                ], 500);
            }
        }
        return response("success");
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->setData($request);
        return redirect()->back();
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

    public function show($id)
    {
        return User::with('profile')->find($id);
    }
}
