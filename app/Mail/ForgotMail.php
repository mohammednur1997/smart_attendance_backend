<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $token;
    public $email;

    public function __construct($token, $email)
    {
        //this is token
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $data = $this->token;
         $email = $this->email;
        return $this->from('programmingtest1997@gmail.com')->view('Backend.adminAuth.forgotPass', compact('data', 'email'))->subject("Reset Password");
    }
}
