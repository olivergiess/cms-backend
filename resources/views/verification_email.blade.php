<p>
    Hi {{ $name }},
</p>
<p>
    To make sure it's really you please verify your email by clicking the link below.
</p>
<p>
    {{ env('APP_ENDPOINT') }}/{{ $email }}/{{ $expiry }}/{{ $signature }}
</p>
<p>
    Kind regards, {{ env('MAIL_FROM_NAME') }}
</p>
