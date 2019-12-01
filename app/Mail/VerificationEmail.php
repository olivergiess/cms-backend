<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class VerificationEmail extends Mailable
{
    use Queueable;

    public $user;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $token)
    {
        $this->user  = $user;
        $this->token = urlencode($token);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this::subject('Email Verification')
            ->view('verification_email');
    }
}
