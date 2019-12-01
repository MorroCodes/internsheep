

@extends('layouts/company')

@section('content')
<div class="card text-center">
  <div class="card-header">
    Flux
  </div>
  <form action="{{route('internship.update',[$internship->id])}}" method="post">
    <div class="card-body">
      <div class="form-group">
        <h3>Titel</h3>
          <input type="text" class="form-control" id="title_vacature" value="{{$internship->title}}" name='title'>
              <h3>Plaats</h3>
              <input type="text" class="form-control" value="{{$internship->address}}" name='address'>
          <h3 class="space">bedrijfsbeschrijving</h3>
          <input type="textarea" class="form-control" rows="8" cols="50" value="{{$internship->description}}" name='description'>
          <h3>Functieomschrijving</h3>
          <input type="textarea" class="form-control" rows="8" cols="50" value="{{$internship->functie_omschrijving}}" name='functie_omschrijving'>
          <h3>Wat bieden wij aan ?</h3>
          <input type="textarea" class="form-control" rows="8" cols="50" value="{{$internship->aanbod}}" name='aanbod'>
      </div>
      <button type="submit" class="btn btn-primary">Aanpassen</button>
      {{csrf_field()}}
    </div>
  </form>
        <div class="card-footer text-muted">
        {{$internship->created_at}}
        </div>
@endsection
