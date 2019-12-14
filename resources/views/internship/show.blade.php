@extends('layouts/main')

@section('content')

<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8 mb-5">
        <div class="popup-message">
            <form action="{{ action('MessageController@startConversation') }}" method="post">

                <input type="hidden" name="company" value="{{$internship->company_id}}">
                <input type="hidden" class="application-id" name="application" value="">
                <input type="hidden" class="student-id" name="student" value="">
                <input type="hidden" name="internship" value="{{$internship->id}}">

                <div class="form-group">
                    <label for="message" class="popup-title"></label>
                    <textarea name="message" class="form-control message-input" id="message"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Verstuur bericht</button>
            {{csrf_field()}}
            </form>

            <img class="close" src="{{ asset('img/close.svg') }}">
        </div>

        <div class="popup-overlay"></div>

        <div class="card text-center">
            <div class="card-header">
            {{$internship->title}}
            </div>

            <div class="card-body card-body-show-internship">
               
                <div class="flex2">
                  <h3 class="create-internship-title">Plaats</h3>
                  <p class="location">{{$internship->address}}</p>
                </div class="vacatureBody">
                    <h3 class="create-internship-title">bedrijfsbeschrijving</h3>
                    <p>{{$internship->description}}</p>
                    <h3 class="create-internship-title">Functieomschrijving</h3>
                    <p>{{$internship->functie_omschrijving}}</p>
                    <h3 class="create-internship-title">Wat bieden wij aan ?</h3>
                    <p>{{$internship->aanbod}}</p>
                
                <a href="{{route('internship.edit', [$internship->id])}}">
                    <button>Aanpassen</button>
                </a>
            </div>

          <div class="internship-applications">
          <h3>Sollicitaties</h3>
          @if($applications == null)
          <div>
          <p>Er zijn nog geen sollicitaties voor deze vacature.</p>
          </div>
          @else
          <div class="application-cards">
            
            @foreach($applications as $a)
                @component('components/applications')
                    @slot('firstname') {{$a->firstname}} @endslot
                    @slot('lastname') {{$a->lastname}} @endslot
                    @slot('reason') {{$a->reason}} @endslot
                    @slot('response') {{$a->response}} @endslot
                    @slot('email') {{$a->email}} @endslot
                    @slot('created_at') {{$a->created_at}} @endslot
                    @slot('id') {{$a->id}} @endslot
                    @slot('student_id') {{$a->student_id}} @endslot
                @endcomponent
            @endforeach
        
          
          </div>
        @endif
        </div>

            <div class="card-footer text-muted">
            {{$internship->created_at}}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection