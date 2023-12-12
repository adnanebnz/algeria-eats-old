<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AcceptedDeliverymail extends Mailable
{
    use Queueable, SerializesModels;

    public $delivery;
    public function __construct($delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(subject: "Livraison acceptée");
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(view: "emails.accepted-delivery-mail");
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
