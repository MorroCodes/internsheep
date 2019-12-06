@extends('layouts/main')

@section('content')
<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8 mb-5">
<div class="card text-center">
  <div class="card-header">
    Voeg een vacature toe
  </div>
  <form action="" method="post">
  <input type="hidden" name="company" value="">
      <div class="form-group">
        <div class="col-md-13 mb-3 mb-md-0">
        <h3>Titel</h3>
          <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title_vacature" name='title'>
          @error('title')
            <span class="invalid-feedback" role="alert">
              <strong>{{$errors->first('title')}}</strong>
            </span>
          @enderror
          </div>
          </div>
              <h3>Plaats</h3>
          <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name='address'>
          @error('address')
            <span class="invalid-feedback" role="alert">
              <strong>{{$errors->first('address')}}</strong>
            </span>
          @enderror
          <h3 class="space">Beschrijving vacature</h3>
          <input type="textarea" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" rows="8" cols="50" name='description'>
          @error('description')
            <span class="invalid-feedback" role="alert">
              <strong>{{$errors->first('description')}}</strong>
            </span>
          @enderror
          <h3>Functieomschrijving</h3>
          <input type="textarea" class="form-control  @error('functie_omschrijving') is-invalid @enderror" value="{{ old('functie_omschrijving') }}" rows="8" cols="50" name='functie_omschrijving'>
          @error('functie_omschrijving')
            <span class="invalid-feedback" role="alert">
              <strong>{{$errors->first('functie_omschrijving')}}</strong>
            </span>
          @enderror
          <h3>Ons aanbod?</h3>
          <input type="textarea" class="form-control @error('aanbod') is-invalid @enderror" value="{{ old('aanbod') }}" rows="8" cols="50" name='aanbod'>
          @error('aanbod')
            <span class="invalid-feedback" role="alert">
              <strong>{{$errors->first('aanbod')}}</strong>
            </span>
          @enderror
      </div>
      <button type="submit" class="btn btn-primary">Maak deze vacature aan</button>
      </div>
      {{csrf_field()}}
    </div>
  </form>
@endsection