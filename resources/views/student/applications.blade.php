@extends('layouts.app')

@section('content')
<div class="internship-applications">
    <h3>Sollicitaties</h3>
      @if($applications == null)
        <div>
          <p>Je hebt nog niet gesolliciteerd.</p>
        </div>
      @else
        <div class="application-cards">
            @foreach($applications as $a)
            <div class="application-card">

              <div class="application-card-title">
                <a href="{{route('home',[$a->internships_id])}}"><h4>{{$a->title}}</h4></a>
              </div>

              <div class="application-card-content">
                <h5>Bericht</h5>
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
