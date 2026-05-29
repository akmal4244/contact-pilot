<?php

namespace App\Actions;

use App\Jobs\SendContactNotification;
use App\Models\ContactMessage;

class SubmitContactAction
{
    public function execute(array $data, string $ip): ContactMessage
    {
        $message = ContactMessage::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'phone'      => $data['phone'] ?? null,
            'subject'    => $data['subject'],
            'message'    => $data['message'],
            'ip_address' => $ip,
        ]);

        SendContactNotification::dispatch($message);

        return $message;
    }
}
