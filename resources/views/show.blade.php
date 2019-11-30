@extends('layouts/yourCompany')

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
@section('content')
<div class="card text-center">
  <div class="card-header">
    Flux
  </div>
  <div class="card-body">
    <h1 id="title_vacature">{{$internship->title}}</h1>
    <div class="flex2">
        <h3 class="plaats">Plaats</h3>
        <p class="location">{{$internship->address}}</p>
    </div class="vacatureBody">
    <h3 class="space">bedrijfsbeschrijving</h3>
    <p>{{$internship->description}}</p>
    <h3>Functieomschrijving</h3>
    <p>{{$internship->functie_omschrijving}}</p>
    <h3>Wat bieden wij aan ?</h3>
    <p>{{$internship->aanbod}}</p>
    <a href="{{route('internship.edit', [$internship->id])}}">
      <button>
      edit
      </button>
    </a>
  </div>
  <div class="card-footer text-muted">
  {{$internship->created_at}}
  </div>
</div>
@endsection
