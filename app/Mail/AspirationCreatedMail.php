<?php

namespace App\Mail;

use App\Models\Aspiration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AspirationCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $aspiration;

    public function __construct(Aspiration $aspiration)
    {
        $this->aspiration = $aspiration;
    }

    public function build()
    {
        return $this->subject('Aspirasi Baru Telah Masuk')
            ->view('emails.aspiration_created')
            ->with([
                'aspiration' => $this->aspiration
            ]);
    }
}