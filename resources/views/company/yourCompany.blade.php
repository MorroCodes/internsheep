@extends('layouts/company')

@section('content')
<div class="flex">
<h1>Jouw vacatures</h1>
  <img src="/img/bg.png" alt="bg" class="bg">
</div>
<a href="{{route('internship.create')}}">
        <button class="btn btn-primary">Toevoegen</button>
        </a>
<div class="internships">
  @forelse($internship as $i)
  <div class="card internship_container">
      <div class="card-body">
        <h5 class="card-title">{{$i->title}}</h5>
        <p class="card-text">{{$i->description}}</p>
        <a href="{{route('internship.show',[$i->id])}}">
        <button class="btn btn-primary">view</button>
        </a>
      </div>
    </div>
      @empty
      <h1>Je hebt nog geen vacatures!</h1>
  @endforelse
    </div>

@endsection



