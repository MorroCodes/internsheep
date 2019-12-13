<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('partials.head')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body class="entry-page">
@include('partials.nav')

@yield('content')

</body>
</html>
<script>let base_url = window.location.origin;</script>
<script src="{{ URL::asset('js/responsive-menu.js') }}"></script>
<script src="{{asset('js/internshipFormPlaceholders.js')}}"></script>
<script src="{{asset('js/surveyResults.js')}}"></script>
<script src="{{asset('js/applicationResponse.js')}}"></script>


</html>
