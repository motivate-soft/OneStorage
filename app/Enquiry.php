<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Helper;
use Illuminate\Http\Request;

class Enquiry extends Model
{
    //
    public static $UPLOAD_PATH = "/uploads/";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user(){
        return $this->belongsToMany('App\User');
    }

    public function changeState(){
        $this->status = $this->status == '未' ? '已' : '未';
        $this->principal = Auth::user()->getName();
        $this->save();
    }

    /**
     * @param Request $request
     * @param $name
     * @return string|null
     */
    public function saveFile(Request $request, $name){
        if ($request->hasFile($name)) {
            $file = $request->file($name);
            $fileName = time() . Helper::getRandomString() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path(static::$UPLOAD_PATH);
            $file->move($destinationPath, $fileName);
            return static::$UPLOAD_PATH. $fileName;
        }
        return null;
    }

    /**
     * @param Request $request
     */
    public function setData(Request $request){
        $this->first_name = $request->firstName;
        $this->last_name = $request->lastName;
        $this->phone_number = isset($request->phoneNumber) ? $request->phoneNumber : '';
        $this->email = isset($request->email) ? $request->email : Helper::$ONESTORAGE_EMAIL;
        $this->branch_name = isset($request->branchName) ? $request->branchName : '';
        $this->branch_size = isset($request->branchSize) ? $request->branchSize : null;
        $this->question = isset($request->question) ? $request->question : '';
        $this->message = isset($request->message) ? $request->message : '';
        $this->store_price = isset($request->price) ? (int)$request->price: null;
        $this->transported = isset($request->transported) &&  $request->transported == "on";
        $this->page = $request->page;

        //save cv file
        $this->cv_file = $this->saveFile($request, "fileCV");
        $this->cl_file = $this->saveFile($request, "fileCL");

        $user = Auth::user();
        if ($user && !$user->isAdmin()) {
            $this->user_id = $user->id;
        }

        $this->save();
    }
}
