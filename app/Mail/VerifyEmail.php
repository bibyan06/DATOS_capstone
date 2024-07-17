<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $verification_token;

    public function __construct($verification_token)
    {
        $this->verification_token = $verification_token;
    }

    public function build()
    {
        return $this->view('emails.verify-email')
            ->with([
                'verification_token' => $this->verification_token,
            ]);
    }
}
