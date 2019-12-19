<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('partials.head')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InternSheep</title>

</head>
<body class="entry-page">
@include('partials.nav')

@yield('content')

</body>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script>let base_url = window.location.origin;</script>
<script src="{{ URL::asset('js/responsive-menu.js') }}"></script>
<script src="{{asset('js/internshipFormPlaceholders.js')}}"></script>
<script src="{{asset('js/surveyResults.js')}}"></script>
<script src="{{asset('js/applicationResponse.js')}}"></script>


</html>
