<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationMail extends Mailable
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
        $attach = env('APP_URL') . "/temp/PKM.pdf";
        $image = env('APP_URL') . "/images/loginJoinKilatFix.png";
        return $this->subject('Confirmation Registration of Joinkilat.com')
        ->attach(public_path('/temp/PKM.pdf'), [
                'as' => 'PKM.pdf',
                'mime' => 'application/pdf',
            ])
        ->view('email.ConfirmationEmail') 
        ->with(['image' => $image]);
    }
}
