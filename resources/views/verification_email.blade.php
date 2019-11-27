<p>
    Hi {{ $user->first_name }},
</p>
<p>
    To make sure it's really you please verify your email by clicking the button below!
</p>
<p>
    {{ env('APP_ENDPOINT') }}/{{ $user->id }}/{{ $token }}
</p>
<p>
    Kind regards, {{ env('MAIL_FROM_NAME') }}
</p>
