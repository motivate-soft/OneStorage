<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Exports\EnquiriesExport;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

        if($key && $value){
            $enquiries = Enquiry::where($key, 'like', '%'.$value.'%')->orderBy('id', 'desc');
        }else{
            $enquiries = Enquiry::orderBy('id', 'desc');
        }

        $enquiries = $enquiries->paginate(10)->appends(request()->query());

      
        
        return view('backend.enquiries', ['enquiries' => $enquiries, 'keys' => static::$SEARCH_KEYS]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $enquiry->email = isset($request->email) ? $request->email : '';
        $enquiry->branch_name = isset($request->branchName) ? $request->branchName : '';
        $enquiry->branch_size = isset($request->branchSize) ? $request->branchSize : null;
        $enquiry->question = isset($request->question) ? $request->question : '';
        $enquiry->message = isset($request->message) ? $request->message : '';
        $enquiry->page = $request->page;
        $enquiry->save();

        $ajax = isset($request->ajax) ? $request->ajax : 0;
        if($ajax == 1){
            $is_member = User::where('email', $enquiry->email)->first() != null;
            return [
                'state' => 'success',
                'is_member' => $is_member
            ];
        }else{
            return redirect()->back();
        }
        
    }

    public function accept()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $enquiry = Enquiry::find($id);
        if($enquiry){
            $enquiry->status = $enquiry->status == '未' ? '已' : '未';
            $enquiry->principal = Auth::user()->getName();
            $enquiry->save();
        }
        return redirect('/backend');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {
        //
    }

    public function export()
    {
        return Excel::download(new EnquiriesExport, 'enquiries.xlsx');
    }
}
