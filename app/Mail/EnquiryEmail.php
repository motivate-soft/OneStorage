<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Enquiry;

class EnquiryEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $enquiry;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Enquiry $enquiry)
    {
        //
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->from($this->enquiry->email)
            ->view('emails.enquiry');

        if($this->enquiry->cv_file){
            $mail->attach(public_path($this->enquiry->cv_file), [
                'as' => 'CV.'.pathinfo($this->enquiry->cv_file, PATHINFO_EXTENSION),
            ]);
        }
        if($this->enquiry->cl_file){
            $mail->attach(public_path($this->enquiry->cl_file), [
                'as' => 'CoverLetter.'.pathinfo($this->enquiry->cl_file, PATHINFO_EXTENSION),
            ]);
        }

        return $mail;
    }
}
