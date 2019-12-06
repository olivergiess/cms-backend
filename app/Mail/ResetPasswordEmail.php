<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class ResetPasswordEmail extends Mailable
{
    use Queueable;

    public $name;
    public $expiry;
    public $email;
    public $signature;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $expiry, $signature)
    {
        $this->name      = $name;
        $this->email     = $email;
        $this->expiry    = $expiry;
        $this->signature = urlencode($signature);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this::subject('Reset Password')
            ->view('reset_password');
    }
}
