<?php

namespace App\Mail;

use App\Models\GrantWriter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class IAmAGrantWriter extends Mailable
{
    use Queueable, SerializesModels;

    public $grantwriter;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(GrantWriter $grantwriter)
    {
        $this->grantwriter = $grantwriter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Grant Writer Information')
                    ->view('emails.mail_grantwriter');
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'I Am A Grant Writer',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.grantwriter',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
