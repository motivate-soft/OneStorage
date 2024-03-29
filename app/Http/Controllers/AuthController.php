<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Exports\UsersExport;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Mail\Mailer;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    protected $mailer;
    protected $toEmail = "";
    protected $adminEmail = "noreply@onestorage.com.hk";

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function index(){
        //
        $SEARCH_KEYS = [
            [
                'key' => 'users.created_at',
                'value' => __('backend_members.regDate')
            ],
            [
                'key' => 'users.first_name',
                'value' => __('backend_members.firstName')
            ],
            [
                'key' => 'users.last_name',
                'value' => __('backend_members.lastName')
            ],
            [
                'key' => 'users.phone',
                'value' => __('backend_members.telephone')
            ],
            [
                'key' => 'users.email',
                'value' => __('backend_members.email')
            ],
            [
                'key' => 'profiles.address_line1',
                'value' => __('backend_members.address')
            ],
            [
                'key' => 'profiles.birthday',
                'value' => __('backend_members.DOB')
            ],
            [
                'key' => 'profiles.is_soundwill_member',
                'value' => __('backend_members.returning')
            ],
            [
                'key' => 'profiles.contact_method',
                'value' => __('backend_members.contactMethod')
            ],
            [
                'key' => 'enquiry',
                'value' => __('backend_members.inquire')
            ],
        ];

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

        return view('backend.members', ['members' => $members, 'keys' => $SEARCH_KEYS]);
    }

    /**
     * Handle an authentication attempt.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request){
        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials, true)) {
            // Authentication passed...
            return redirect()->intended();
        }
        return redirect()->route('login')->withErrors(['error' => '手機號碼或密碼錯誤']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function adminLogin(Request $request){
        $credentials = $request->only('first_name', 'password', 'role');

        if (Auth::attempt($credentials, true)) {
            // Authentication passed...
            return redirect('backend');
        }
        return redirect('backend/login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function loginPage(){
        if (Auth::check()) {
            return redirect()->intended();
        }
        return view('account.login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function registerPage(){
        return view('account.register');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function forgotPwdPage(){
        return view('account.forgot-password');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forgotPwd(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function forgotNumPage(){
        return view('account.forgot-number');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forgotNum(Request $request){

        $request->validate(['email' => 'required|email']);

        $this->toEmail = $request->email;

        try {
            $this->mailer->send('partials.lead', ['number'=>User::where("email", $this->toEmail)->first()->phone], function (Message $m){
                $m->from($this->adminEmail)->to($this->toEmail)->subject('OneStorage');
            });
            $status = true;
        } catch (\Exception $e)
        {
            $status = $e->getMessage();
        }

        return $status === true
            ? back()->with(['status' => __("Success")])
            : back()->withErrors(['email' => __($status)]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPwd(Request $request){
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateByAdmin(Request $request){
        $user = User::findOrFail($request->id);
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
        return redirect()->route('backend.members');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function register(Request $request){
        $user = new User;
        try{
            $user->setData($request);
        }catch(QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                $value = "";
                $key = "";
                sscanf($e->errorInfo[2], "Duplicate entry %s for key 'users.users_%s_unique'", $value, $key);
                $key = explode("_", $key)[0];
                if($key != 'phone' && $key = 'email'){
                    $key = 'other';
                }

                $duplicationMsg = [
                    'phone' =>  '此手機號碼已被使用',
                    'email' => '此手機號碼已被使用',
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request){
        $user = Auth::user();
        $user->setData($request);
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(){
        return Excel::download(new UsersExport, 'members.xlsx');
    }


    public function show($id){
        return User::with('profile')->find($id);
    }
}
