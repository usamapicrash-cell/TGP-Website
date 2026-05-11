<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClientAcknowledgmentMail extends Mailable
{
    use Queueable, SerializesModels;

   public $details;
   public $extra; // Naya variable

    public function __construct($details, $extra)
    {
        $this->details = $details;
        $this->extra = $extra;
    }

    public function build()
    {
        return $this->subject('We Received Your Request - The Glass People')
                    ->view('emails.client_thank_you');
    }
}
