@component('mail::message')
# Thanks for signing up

Welcome to InternSheep!

@component('mail::button', ['url' => 'https://internsheep.weareimd.be/login'])
Welcome
@endcomponent

Thanks,<br>
InternSheep
<!-- {{ config('app.name') }} -->
@endcomponent
