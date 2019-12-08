@component('mail::message')
# Hello {{$user->firstname}},

@if($amount > 1)
<p>Er zijn {{$amount}} nieuwe vacatures toegevoegd de afgelopen week. Neem snel een kijkje!</p>
@else
<p>Nog op zoek naar de perfecte stage match? InternSheep staat voor je klaar.</p>
@endif

@component('mail::button', ['url' => 'https://internsheep.weareimd.be/login'])
Visit InternSheep
@endcomponent

Thanks,<br>
InternSheep
<!-- {{ config('app.name') }} -->
@endcomponent
