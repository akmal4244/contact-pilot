{{-- resources/views/mail/admin-contact.blade.php --}}
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"></head>
<body style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">

    <h1 style="color: #4F46E5;">Mesej Baru Dari Contact Form</h1>

    <p><strong>Dari:</strong> {{ $contactMessage->name }} ({{ $contactMessage->email }})</p>

    @if($contactMessage->phone)
    <p><strong>Telefon:</strong> {{ $contactMessage->phone }}</p>
    @endif

    <p><strong>Subjek:</strong> {{ $contactMessage->subject }}</p>

    <hr>

    <p>{{ $contactMessage->message }}</p>

    <hr>

    <p style="color: #666; font-size: 12px;">
        <strong>IP:</strong> {{ $contactMessage->ip_address }}<br>
        <strong>Tarikh:</strong> {{ $contactMessage->created_at->format('d/m/Y H:i') }}
    </p>

</body>
</html>
