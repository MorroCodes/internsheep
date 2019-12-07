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
<script src="{{ URL::asset('js/responsive-menu.js') }}"></script>
