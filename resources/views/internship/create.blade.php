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
          <form action="{{ action('VacatureController@store') }}" method="post">
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
        
              {{csrf_field()}}
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection