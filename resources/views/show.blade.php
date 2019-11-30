
@extends('layouts/vacature')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
@section('nav')
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
    <a class="nav-link" href="#">Profiel</a>
  </li>
</ul>

<div class="nav" id="nav2">
    <img src="/img/intr.png" alt="profile pic" class="icon">
    <p>Interacto</p>
</div>


@endsection
@section('vacature')
<div class="card text-center">
  <div class="card-header">
    Flux
  </div>
  <form action="{{ action('VacatureController@handleCompanyData') }}" method="post">
    <div class="card-body">
      <div class="form-group">
        <h3>Titel</h3>
          <input type="text" class="form-control" id="title_vacature" value="{{$internship->title}}">
              <h3>Plaats</h3>
              <input type="text" class="form-control" value="{{$internship->address}}">
          <h3 class="space">bedrijfsbeschrijving</h3>
          <input type="textarea" class="form-control" rows="8" cols="50" value="{{$internship->description}}">
          <h3>Functieomschrijving</h3>
          <input type="textarea" class="form-control" rows="8" cols="50" value="{{$internship->functie_omschrijving}}">
          <h3>Wat bieden wij aan ?</h3>
          <input type="textarea" class="form-control" rows="8" cols="50" value="{{$internship->aanbod}}">
      </div>
      <button type="submit" class="btn btn-primary">Aanpassen</button>
      {{csrf_field()}}
    </div>
  </form>
        <div class="card-footer text-muted">
        {{$internship->created_at}}
        </div>
@endsection
</body>
</html>