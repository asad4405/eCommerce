<x-mail::message>
# Congratulation {{ $name }},

You are our new Admin

<x-mail::panel>
Email: {{ $email }}
</x-mail::panel>
<x-mail::panel>
Password: {{ $password }}
</x-mail::panel>

<x-mail::button :url="url('login')" color="success">
Click Here to Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
