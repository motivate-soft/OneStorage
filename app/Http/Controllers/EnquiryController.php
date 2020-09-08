<?php

namespace App\Http\Controllers;

use App\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $enquiries = Enquiry::orderBy('id', 'desc')->get();
        return view('backend.enquiries', ['enquiries' => $enquiries]);
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
        $enquiry->user_name = $request->firstName.' '.$request->lastName;
        $enquiry->phone_number = isset($request->phoneNumber) ? $request->phoneNumber : '';
        $enquiry->email = isset($request->email) ? $request->email : '';
        $enquiry->branch_name = isset($request->branchName) ? $request->branchName : '';
        $enquiry->branch_size = isset($request->branchSize) ? $request->branchSize : null;
        $enquiry->question = isset($request->question) ? $request->question : '';
        $enquiry->message = isset($request->message) ? $request->message : '';
        $enquiry->page = $request->page;
        $enquiry->save();
        return redirect()->back();
    }

    public function accept()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $enquiry = Enquiry::find($id);
        if($enquiry){
            $enquiry->status = 1;
            // $enquiry->principal_id = Auth()->id;
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
}
