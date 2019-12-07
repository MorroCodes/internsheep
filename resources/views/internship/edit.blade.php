

@extends('layouts/main')

@section('content')
<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8 mb-5">
<div class="card text-center">

  <form action="{{route('internship.update',[$internship->id])}}" method="post">
  <div class="form-group">
        <div class="col-md-13 mb-3 mb-md-0">
        <h3 class="create-internship-title">Titel</h3>
        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title_vacature" name='title'>
          @error('title')
            @component('components/empty_input_alert')
              @slot('message') {{$errors->first('title')}} @endslot
            @endcomponent
          @enderror
          </div>
          </div>
              <h3 class="create-internship-title">Plaats</h3>
          <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name='address'>
          @error('address')
            @component('components/empty_input_alert')
              @slot('message') {{$errors->first('address')}} @endslot
            @endcomponent
          @enderror
          <h3 class="create-internship-title space">Beschrijving vacature</h3>
          <input type="textarea" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" rows="8" cols="50" name='description'>
          @error('description')
            @component('components/empty_input_alert')
              @slot('message') {{$errors->first('description')}} @endslot
            @endcomponent
          @enderror
          <h3 class="create-internship-title">Functieomschrijving</h3>
          <input type="textarea" class="form-control  @error('functie_omschrijving') is-invalid @enderror" value="{{ old('functie_omschrijving') }}" rows="8" cols="50" name='functie_omschrijving'>
          @error('functie_omschrijving')
            @component('components/empty_input_alert')
              @slot('message') {{$errors->first('functie_omschrijving')}} @endslot
            @endcomponent
          @enderror
          <h3 class="create-internship-title">Ons aanbod?</h3>
          <input type="textarea" class="form-control @error('aanbod') is-invalid @enderror" value="{{ old('aanbod') }}" rows="8" cols="50" name='aanbod'>
          @error('aanbod')
            @component('components/empty_input_alert')
              @slot('message') {{$errors->first('aanbod')}} @endslot
            @endcomponent
          @enderror
      </div>
      <button type="submit" class="btn btn-primary">Aanpassen</button>
      {{csrf_field()}}
    </div>
  </form>
        <div class="card-footer text-muted">
        {{$internship->created_at}}
        </div>
@endsection
