@extends('layouts/main')

@section('content')
<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="internship-form-container">
        <div class="card text-center">
          <div class="card-header">
            Voeg een vacature toe
          </div>
          <form action="{{ action('VacatureController@store') }}" method="post" class="internship-create-form-control"
            @if(!empty($error))
                @component('components/alert')
                  @slot('message') {{$error}} @endslot
                  @slot('alert_type') alert-primary @endslot
                @endcomponent
            @endif

            @component('components/vacature_form')
              @if(!empty($values))
                @slot('title') {{$values['title']}} @endslot
                @slot('address') {{$values['address']}} @endslot
                @slot('description') {{$values['description']}} @endslot
                @slot('functie_omschrijving') {{$values['functie_omschrijving']}} @endslot
                @slot('aanbod') {{$values['aanbod']}} @endslot
              @endif
            @endcomponent
            <button type="submit" class="btn btn-primary">Maak deze vacature aan</button>
            {{csrf_field()}}
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection