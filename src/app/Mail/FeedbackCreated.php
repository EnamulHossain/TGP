<?php

namespace App\Mail;

use App\Models\FeedbackContactUs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FeedbackCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $feedback;

    public function __construct(FeedbackContactUs $feedback)
    {
        $this->feedback = $feedback;
    }


    public function build()
    {
        return $this->view('emails.feedback.created')
            ->with([
                'feedback' => $this->feedback,
            ])
            ->subject('Contact Us');
    }


    /**
     * Create a new message instance.
     *
     * @return void
     */

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Contact Us',
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
            view: 'emails.feedback.created',
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
