@extends('layouts/main')

@section('content')
<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8 mb-5">
        <div class="card text-center">
          <div class="card-header">
            Wijzig vacature {{$internship->title}}
          </div>
          <form action="{{route('internship.update',[$internship->id])}}" method="post">
            @if(!empty($error))
                @component('components/alert')
                  @slot('message') {{$error}} @endslot
                  @slot('alert_type') alert-primary @endslot
                @endcomponent
            @endif

              @component('components/vacature_form')
                @if(!empty($internship))
                  @slot('title') {{$internship['title']}} @endslot
                  @slot('address') {{$internship['address']}} @endslot
                  @slot('description') {{$internship['description']}} @endslot
                  @slot('functie_omschrijving') {{$internship['functie_omschrijving']}} @endslot
                  @slot('aanbod') {{$internship['aanbod']}} @endslot
                @endif
              @endcomponent
        
              {{csrf_field()}}
          </form>
          <div class="card-footer text-muted">
          {{$internship->created_at}}
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection