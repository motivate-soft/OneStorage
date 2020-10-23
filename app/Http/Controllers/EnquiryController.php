<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Exports\EnquiriesExport;
use App\Helper\Helper;
use App\Mail\DiscountEmail;
use App\Mail\EnquiryEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    public static $SEARCH_KEYS = [
        [
            'key' => 'created_at',
            'value' => '日期'
        ],
        [
            'key' => 'first_name',
            'value' => 'First name'
        ],
        [
            'key' => 'last_name',
            'value' => 'Last name'
        ],
        [
            'key' => 'phone_number',
            'value' => 'Telephone'
        ],
        [
            'key' => 'email',
            'value' => 'Email'
        ],
        [
            'key' => 'branch_name',
            'value' => '需求'
        ],
        [
            'key' => 'question',
            'value' => '查詢問題'
        ],
        [
            'key' => 'message',
            'value' => '你的信息'
        ],
        [
            'key' => 'page',
            'value' => '頁面'
        ],
        [
            'key' => 'status',
            'value' => '狀態'
        ],
        [
            'key' => 'principal',
            'value' => '負責人'
        ]
    ];
    public static $EXPORT_NAME = "enquiries.xlsx";
    public static $UPLOAD_PATH = "/uploads";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $key = isset($_GET['key']) ? $_GET['key'] : '';
        $value = isset($_GET['value']) ? $_GET['value'] : '';

        if ($key && $value) {
            $enquiries = Enquiry::where($key, 'like', '%' . $value . '%')->orderBy('id', 'desc');
        } else {
            $enquiries = Enquiry::orderBy('id', 'desc');
        }

        $enquiries = $enquiries->paginate(10)->appends(request()->query());


        return view('backend.enquiries', ['enquiries' => $enquiries, 'keys' => static::$SEARCH_KEYS]);
    }

    public function saveFile(Request $request, $name)
    {
        if ($request->hasFile($name)) {
            $file = $request->file($name);
            $fileName = time() . Helper::getRandomString() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path(static::$UPLOAD_PATH);
            $file->move($destinationPath, $fileName);
            return static::$UPLOAD_PATH.'/'. $fileName;
        }
        return null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        //
        $enquiry = new Enquiry;
        $enquiry->first_name = $request->firstName;
        $enquiry->last_name = $request->lastName;
        $enquiry->phone_number = isset($request->phoneNumber) ? $request->phoneNumber : '';
        $enquiry->email = isset($request->email) ? $request->email : Helper::$ONESTORAGE_EMAIL;
        $enquiry->branch_name = isset($request->branchName) ? $request->branchName : '';
        $enquiry->branch_size = isset($request->branchSize) ? $request->branchSize : null;
        $enquiry->question = isset($request->question) ? $request->question : '';
        $enquiry->message = isset($request->message) ? $request->message : '';
        $enquiry->store_price = isset($request->price) ? (int)$request->price: null;
        $enquiry->transported = isset($request->transported) &&  $request->transported == "on";
        $enquiry->page = $request->page;

        //save cv file
        $enquiry->cv_file = $this->saveFile($request, "fileCV");
        $enquiry->cl_file = $this->saveFile($request, "fileCL");

        $user = Auth::user();
        if ($user && !$user->isAdmin()) {
            $enquiry->user_id = $user->id;
        }
        $enquiry->save();

        //send email
        Mail::to(Helper::$ONESTORAGE_EMAIL)->queue(new EnquiryEmail($enquiry));
        if ($enquiry->page == Helper::$SS_FROM_FRONT_PAGE1) {
            Mail::to($enquiry->email)->queue(new DiscountEmail);
        }
//        else if($enquiry->email != Helper::$ONESTORAGE_EMAIL){
//            Mail::to($enquiry->email)->queue(new EnquiryEmail($enquiry, false));
//        }

        return response([
            'state' => 'success',
            'logged_in' => Auth::check()
        ]);
    }

    public function accept($id)
    {
        $enquiry = Enquiry::find($id);
        if ($enquiry) {
            $enquiry->status = $enquiry->status == '未' ? '已' : '未';
            $enquiry->principal = Auth::user()->getName();
            $enquiry->save();
        }
        return redirect()->route('backend.enquiries');
    }

    public function export()
    {
        return Excel::download(new EnquiriesExport, static::$EXPORT_NAME);
    }
}
