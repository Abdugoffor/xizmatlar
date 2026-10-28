<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactMessage extends Mailable
{
    public function __construct(public array $data) {}

    public function build(): self
    {
        return $this->subject('New website request')
            ->replyTo($this->data['email'], $this->data['name'])
            ->view('emails.contact');
    }
}
