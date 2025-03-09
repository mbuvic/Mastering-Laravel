<x-mail::message>
<h1>Registration Successful</h1>
Dear {{ $user->first_name.' '.$user->last_name }},

Your registration has been successful.

<x-mail::button :url="url('/login')">
Login To Account
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
