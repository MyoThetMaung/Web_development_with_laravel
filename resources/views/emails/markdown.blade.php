@component('mail::message')
# Myself

Hello my name is saimon and I am a developer.

@component('mail::button', ['url' => 'https://www.aprogrammer.blog/learn/laravel'])
A Programmer
@endcomponent

Thanks All,<br>
{{ config('app.name') }}
@endcomponent
