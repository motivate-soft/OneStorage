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

/**
 * Class EnquiryController
 * @package App\Http\Controllers
 */
class EnquiryController extends Controller
{
    public static $EXPORT_NAME = "enquiries.xlsx";
    public static $ROWS_PER_PAGE = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $SEARCH_KEYS = [
            [
                'key' => 'created_at',
                'value' => __('backend_enquiries.date')
            ],
            [
                'key' => 'first_name',
                'value' => __('backend_enquiries.firstName')
            ],
            [
                'key' => 'last_name',
                'value' => __('backend_enquiries.lastName')
            ],
            [
                'key' => 'phone_number',
                'value' => __('backend_enquiries.telephone')
            ],
            [
                'key' => 'email',
                'value' => __('backend_enquiries.email')
            ],
            [
                'key' => 'branch_name',
                'value' => __('backend_enquiries.demand')
            ],
            [
                'key' => 'question',
                'value' => __('backend_enquiries.question')
            ],
            [
                'key' => 'message',
                'value' => __('backend_enquiries.message')
            ],
            [
                'key' => 'page',
                'value' => __('backend_enquiries.page')
            ],
            [
                'key' => 'status',
                'value' => __('backend_enquiries.status')
            ],
            [
                'key' => 'principal',
                'value' => __('backend_enquiries.principle')
            ]
        ];
        $key = isset($_GET['key']) ? $_GET['key'] : '';
        $value = isset($_GET['value']) ? $_GET['value'] : '';

        if ($key && $value) {
            $enquiries = Enquiry::where($key, 'like', '%' . $value . '%')->orderBy('id', 'desc');
        } else {
            $enquiries = Enquiry::orderBy('id', 'desc');
        }

        $enquiries = $enquiries->paginate(static::$ROWS_PER_PAGE)->appends(request()->query());

        return view('backend.enquiries', ['enquiries' => $enquiries, 'keys' => $SEARCH_KEYS]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $enquiry = new Enquiry;
        $enquiry->setData($request);

        //send email
        Mail::to(Helper::$ONESTORAGE_EMAIL)->queue(new EnquiryEmail($enquiry));
        if ($enquiry->page == Helper::$SS_FROM_FRONT_PAGE1) {
            Mail::to($enquiry->email)->queue(new DiscountEmail);
        }

        return response([
            'state' => 'success',
            'logged_in' => Auth::check()
        ]);
    }

    /**
     * Change enquiry state by Admin
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept($id){
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->changeState();
        return redirect()->route('backend.enquiries');
    }

    /**
     * Export Enquiry list to excel file
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(){
        return Excel::download(new EnquiriesExport, static::$EXPORT_NAME);
    }
}
