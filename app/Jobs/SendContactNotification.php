<?php

namespace App\Jobs;

use App\Mail\AdminContactMail;
use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendContactNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public ContactMessage $message
    ) {}

    public function handle(): void
    {
        $adminEmail = config('mail.admin_address', config('mail.from.address'));

        Mail::to($adminEmail)->send(
            new AdminContactMail($this->message)
        );
    }
}
