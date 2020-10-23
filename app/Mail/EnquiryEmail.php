<?php

namespace App\Mail;

use App\Helper\Helper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Enquiry;

class EnquiryEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $enquiry;
    public $toSupport;


    public function __construct(Enquiry $enquiry, bool $toSupport = true)
    {
        //
        $this->enquiry = $enquiry;
        $this->toSupport = $toSupport;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->from($this->toSupport ? $this->enquiry->email : Helper::$ONESTORAGE_EMAIL)
                ->view('emails.enquiry');

        if($this->toSupport && $this->enquiry->cv_file){
            $mail->attach(public_path($this->enquiry->cv_file), [
                'as' => 'CV.'.pathinfo($this->enquiry->cv_file, PATHINFO_EXTENSION),
            ]);
        }
        if($this->toSupport && $this->enquiry->cl_file){
            $mail->attach(public_path($this->enquiry->cl_file), [
                'as' => 'CoverLetter.'.pathinfo($this->enquiry->cl_file, PATHINFO_EXTENSION),
            ]);
        }

        return $mail;
    }
}
