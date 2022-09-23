<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FinishedMitraEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $image = env('APP_URL') . "/images/loginJoinKilatFix.png";
        return $this->subject('Username & Password Application Member of Joinkilat.com')
        ->view('email.FinishEmail')
        ->with(['image' => $image]);
    }
}
