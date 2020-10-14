<?php

namespace App;

use App\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cmgmyr\Messenger\Traits\Messagable;
use Cmgmyr\Messenger\Models\Thread;

class User extends Authenticatable
{

    use Messagable;
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function enquiries()
    {
        return $this->hasMany('App\Enquiry');
    }

    public function getName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function isAdmin()
    {
        return $this->role == "admin";
    }

    public function hasUnreadMsg()
    {
        $threads = Thread::where('subject', '!=', Helper::$MESSAGE_TYPE_BROADCAST)->forUser($this->id)->get();
        $msgCnt = 0;
        foreach ($threads as $thread) {
            $msgCnt += $thread->userUnreadMessagesCount($this->id);
            if ($msgCnt > 0) {
                return true;
            }
        }
        return false;
    }

    public static function getAdmins()
    {
        return User::where('role', 'admin')->get();
    }

    public function getUnConnectedAdmins()
    {
        $threads = Thread::forUser($this->id)->get();
        $ids = [];
        foreach ($threads as $thread) {
            $ids[] = (int)($thread->participantsString($this->id, ['id']));
        }
        return User::where('role', 'admin')->whereNotIn('id', $ids)->get();
    }

    public function setData(Request $data)
    {
        $this->first_name = $data->firstName;
        $this->last_name = $data->lastName;
        $this->phone = $data->phone;
        $this->email = $data->email;
        if (isset($data->password)) {
            $this->password = bcrypt($data->password);
        }
        $this->save();
        $profile = $this->profile;
        if (!$profile) {
            $profile = new Profile;
            $profile->user_id = $this->id;
        }
        if(isset($data->gender)){
            $profile->gender = $data->gender;
        }

        $profile->birthday = $data->year . '/' . $data->month . '/' . $data->day;
        $profile->area = isset($data->area) ? $data->area : '';
        $profile->place = isset($data->place) ? $data->place : '';
        $profile->address_line1 = isset($data->addr1) ? $data->addr1 : '';
        $profile->address_line2 = isset($data->addr2) ? $data->addr2 : '';
        $profile->contact_method = isset($data->contactMethod) ? $data->contactMethod : '';
        $profile->is_existing_customer = isset($data->isCustomer) ? $data->isCustomer == '1' : false;
        $profile->is_soundwill_member = isset($data->isMember) ? $data->isMember == '1' : false;
        $profile->branch_id = isset($data->branch) ? $data->branch : 0;

        //save avatar
        if ($data->hasFile("avatar")) {

            $image = $data->file("avatar");
            $imgName = time() . Helper::getRandomString() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path(Profile::$AVATAR_PREFIX);
            $image->move($destinationPath, $imgName);
            $profile->avatar = $imgName;
        }

        $profile->save();
    }
}
