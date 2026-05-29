<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ContactMessage $contactMessage
    ) {}

    public function build()
    {
        return $this->subject($this->contactMessage->subject)
            ->replyTo($this->contactMessage->email)
            ->view('mail.admin-contact');
    }
}
