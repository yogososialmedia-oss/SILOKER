<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class EmailVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $token;
    public $type;

    public function __construct($user, $token, $type)
    {
        $this->user = $user;
        $this->token = $token;
        $this->type = $type;
    }

    public function build()
    {
        return $this->subject('Verifikasi Email Anda')
                    ->view('emails.verifikasi-email'); // pastikan ini view ada
    }
}
