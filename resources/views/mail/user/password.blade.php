@component('mail::message')
# Hello, {{ $name }}!

Your login: {{ $email }} <br>
Your password: {{ $password }}

@component('mail::button', ['url' => 'http://toffun/'])
Go to Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
