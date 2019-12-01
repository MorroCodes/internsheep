@extends('layouts/company')

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
      Aanpassen
      </button>
    </a>
  </div>
  <div class="card-footer text-muted">
  {{$internship->created_at}}
  </div>
</div>
@endsection
