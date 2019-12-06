@extends('layouts/company')

@section('content')

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

  <div class="internship-applications">
    <h3>Sollicitaties</h3>
      @if($applications == null)
        <div>
          <p>Er zijn nog geen sollicitaties voor deze vacature.</p>
        </div>
      @else
        <div class="application-cards">
            @foreach($applications as $a)
            <div class="application-card">

              <div class="application-card-title">
                <a href="{{route('StudentProfilePublic',[$a->student_id])}}"><h4>{{$a->firstname}} {{$a->lastname}}</h4></a>
                <div>
                  <button class="application-response-deny {{ ($a->response == 'denied') ? 'application-response-selected' : '' }}" data-applicationId="{{$a->student_id}}" >Weiger</button>
                  <button class="application-response-maybe {{ ($a->response == 'maybe') ? 'application-response-selected' : '' }}" data-applicationId="{{$a->id}}" >Misschien</button>
                  <button class="application-response-accept {{ ($a->response == 'accepted') ? 'application-response-selected' : '' }}" data-applicationId="{{$a->id}}">Accepteer</button>
                </div>
              </div>

              <div class="application-card-content">
                <h5>Bericht</h5>
                <p>{{$a->reason}}</p>
                <div>
                  <p>E-mail: {{$a->email}}</p>
                  <p>Verzonden op: {{$a->created_at}}</p>
                </div>
              </div>

              <div>
                <button class="btn btn-primary btn-message" data-applicationId="{{$a->id}}" data-applicant="{{$a->firstname}} {{$a->lastname}}" data-studentId="{{$a->id}}">Start een gesprek</button>
                <a href="/conversations" class="btn btn-primary">Toon berichten</a>
              </div>

            </div>
            @endforeach
        </div>
      @endif
  </div>

  <div class="card-footer text-muted">
  {{$internship->created_at}}
  </div>
</div>
@endsection