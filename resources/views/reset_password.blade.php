<p>
    Hi {{ $name }},
</p>
<p>
    Please find below your password reset link:
</p>
<p>
    {{ env('APP_DOMAIN') }}{{ env('APP_PASSWORD') }}/{{ $email }}/{{ $expiry }}/{{ $signature }}
</p>
<p>
    Kind regards, {{ env('MAIL_FROM_NAME') }}
</p>
