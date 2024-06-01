<?php

namespace App\Mail;

use App\Models\HireGrantWriter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HireGrant extends Mailable
{
    use Queueable, SerializesModels;

    public $hireGrant;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(HireGrantWriter $hireGrant)
    {
        $this->hireGrant = $hireGrant;
    }
    public function build()
{
    return $this->view('emails.hire_grant')
                ->with([
                    'hireGrant' => $this->hireGrant,
                ])
                ->subject('Request a writer');
}

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Request a writer',
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
            view: 'emails.hiregrants',
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
