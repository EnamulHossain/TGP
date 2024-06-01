<?php

namespace App\Mail;

use App\Models\IAmAGrantProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GrantProvider extends Mailable
{
    use Queueable, SerializesModels;
    public $grantprovider;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(IAmAGrantProvider $grantprovider)
    {
        $this->grantprovider = $grantprovider;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Grant Provider Application')
                    ->view('emails.grant_provider')
                    ->with([
                        'grantProvider' => $this->grantprovider,
                    ]);
                    
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Grant Provider Application',
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
            view: 'emails.grantprovider',
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
