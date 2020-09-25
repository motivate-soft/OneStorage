<?php

namespace App;

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
        return $this->first_name.' '.$this->last_name;
    }

    public function isAdmin()
    {
        return $this->role == "admin";
    }

    public function hasUnreadMsg()
    {
        $threads = Thread::forUser($this->id)->get();
        $msgCnt = 0;
        foreach($threads as $thread){
            $msgCnt += $thread->userUnreadMessagesCount($this->id);
            if($msgCnt > 0){
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
        foreach($threads as $thread){
            $ids[] = (int)($thread->participantsString($this->id, ['id']));
        }
        return User::where('role', 'admin')->whereNotIn('id', $ids)->get();
    }
}
