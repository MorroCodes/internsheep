<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body class="company-page">


<ul class="nav" id="nav">
  <li class="nav-item">
    <a class="nav-link active" href="#">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Students</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Meldingen</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" href="#">Meldingen</a>
  </li>
</ul>

<div class="nav" id="nav2">
    <img src="{{asset(Auth::user()->profile_image)}}" alt="profile pic" class="icon" width="100px">
    <p>{{ Auth::user()->firstname}} {{ Auth::user()->lastname}}</p>
</div>

@yield('content')
@yield('app')


</body>
<script>let base_url = window.location.origin;</script>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script src="{{asset('js/surveyResults.js')}}"></script>
<script src="{{asset('js/applicationResponse.js')}}"></script>
</html>