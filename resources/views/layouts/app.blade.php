<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=0GXKzjlA"></script>
    <!-- Styles -->
    @include('partials.head')
</head>
<body>
@include('partials.nav')

    <div id="app">


        <main class="py-4">
            @yield('content')
        </main>
    </div>
    {{-- <script type="text/javascript" src="{{ URL::asset('js/components/voice_api.js') }}"></script> --}}
    <script src="{{ URL::asset('js/components/apply.js') }}"></script>
    <script src="{{asset('js/surveyResults.js')}}"></script>
    <script src="{{asset('js/rating.js')}}"></script>
</body>
</html>
