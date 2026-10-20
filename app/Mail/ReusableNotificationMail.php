<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReusableNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $title,
        public string $greeting,
        public string $messageText,
        public ?string $code = null,
        public ?string $actionUrl = null,
        public ?string $actionText = null,
        public ?string $footerText = null
    ) {
    }

    public function build(): self
    {
        return $this->subject($this->title)
            ->view('emails.reusable-notification');
    }
}
