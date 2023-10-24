<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TokenResend extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
        $this->setMailer();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: globalSettings('mail_from_address'),
            subject: 'Token Resend',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.token',
            with: [
                'user' => $this->user,
            ],
        );
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

    private function setMailer()
    {
        if (globalSettings('mail_driver') == 'sendmail') {
            config([
                'mail.mailers.sendmail.path' => globalSettings('mail_sendmail_path'),
            ]);
        }

        config([
            'mail.default'                 => globalSettings('mail_driver'),
            'mail.mailers.smtp.host'       => globalSettings('mail_host'),
            'mail.mailers.smtp.port'       => globalSettings('mail_port'),
            'mail.mailers.smtp.encryption' => globalSettings('mail_encryption'),
            'mail.mailers.smtp.username'   => globalSettings('mail_username'),
            'mail.mailers.smtp.password'   => globalSettings('mail_password'),
            'mail.from.name'               => globalSettings('mail_from_name')
        ]);
    }
}
