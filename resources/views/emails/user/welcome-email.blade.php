@component('mail::message')
# Thanks for signing up

We zijn blij dat je hebt gekozen om lid te worden van InternSheep!
Laten we samen op zoek gaan naar de juiste match!

@component('mail::button', ['url' => 'https://internsheep.weareimd.be/login'])
Ga naar InternSheep
@endcomponent

Thanks,<br>
InternSheep
<!-- {{ config('app.name') }} -->
@endcomponent
