@extends('layouts.app')

@section('content')
<div class="internship-applications internship-page-student">
    <h3 class="profile-title">Jouw sollicitaties</h3>
      @if($applications->count() == 0)
        <div>
          <p class="empty-applications">Je hebt nog niet gesolliciteerd.</p>
        </div>
      @else
        <div class="application-cards">
            @foreach($applications as $a)

            <!-- @if($a->response == "")
            <h4 class="main-title">Openstaande sollicitaties</h4>
            @elseif($a->response == "accepted")
            <h4 class="main-title">Status: geaccepteerd</h4>
            @elseif($a->response == "maybe")
            <h4 class="main-title">Status: misschien</h4>
            @elseif($a->response == "denied")
            <h4 class="main-title">Status: geweigerd</h4>
            @endif -->
            <div class="application-card">

              <div class="application-card-title">
                <a href="{{route('home',[$a->internships_id])}}">
                  <h4>{{$a->title}}</h4>
                </a>
              </div>
              <div class="application-response-status-container">
                @if($a->response == "")
                  <p>Status: nog geen antwoord</p>
                @elseif($a->response == "accepted")
                  <p>Status: geaccepteerd 👍</p>
                @elseif($a->response == "maybe")
                  <p>Status: misschien 🤔</p>
                @elseif($a->response == "denied")
                  <p>Status: geweigerd 👎</p>
                @endif 
                </div>

              <div class="application-card-content">
                <!-- <h5>Bericht</h5> -->
                <p>{{$a->reason}}</p>
                <div>
                  
                  <p>Verzonden op: {{$a->created_at}}</p>
                </div>
              </div>

              <div>
                <a href="/conversations" class="btn btn-primary">Toon berichten</a>
              </div>

            </div>
            @endforeach
        </div>
      @endif
  </div>
@endsection
