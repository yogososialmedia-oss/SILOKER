<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StatusApplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $apply; // <-- TAMBAHKAN INI

    /**
     * Create a new message instance.
     */
    public function __construct($apply) // <-- GANTI CONSTRUCTOR
    {
        $this->apply = $apply;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Update Status Lamaran Anda', // <-- GANTI SUBJECT
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.status-apply', // <-- GANTI VIEW INI
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}