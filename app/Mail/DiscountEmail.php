<?php

namespace App\Mail;

use App\Helper\Helper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class DiscountEmail
 * @package App\Mail
 */
class DiscountEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(){
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->from(Helper::$ONESTORAGE_EMAIL)
                    ->view('emails.discount')
                    ->subject("至尊迷你倉One Storage 5% off獨家優惠");
    }
}
