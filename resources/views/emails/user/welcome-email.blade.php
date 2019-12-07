@component('mail::message')
# Thanks for signing up

Welcome to InternSheep!

@component('mail::button', ['url' => ''])
Welcome
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
