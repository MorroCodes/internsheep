@extends('layouts/company')

@section('content')
<div class="card text-center">
  <div class="card-header">
    Voeg een vacature toe
  </div>
  <form action="" method="post">
  <input type="hidden" name="company" value="">
    <div class="card-body">
      <div class="form-group">
        <h3>Titel</h3>
          <input type="text" class="form-control" id="title_vacature" value="" name='title'>
              <h3>Plaats</h3>
              <input type="text" class="form-control" value="" name='address'>
          <h3 class="space">Beschrijving vacature</h3>
          <input type="textarea" class="form-control" rows="8" cols="50" value="" name='description'>
          <h3>Functieomschrijving</h3>
          <input type="textarea" class="form-control" rows="8" cols="50" value="" name='functie_omschrijving'>
          <h3>Ons aanbod?</h3>
          <input type="textarea" class="form-control" rows="8" cols="50" value="" name='aanbod'>
      </div>
      <button type="submit" class="btn btn-primary">Maak deze vacature aan</button>
      {{csrf_field()}}
    </div>
  </form>
@endsection