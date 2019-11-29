@extends('layouts/company')
@section('nav')
<ul class="nav" id="nav">
  <li class="nav-item">
    <a class="nav-link active" href="#">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Students</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Meldingen</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Profiel</a>
  </li>
</ul>

<div class="nav" id="nav2">
    <img src="/img/intr.png" alt="profile pic" class="icon">
    <p>Interacto</p>
</div>


@endsection

@section('gallerij')
<div class="flex">
<h1>Jouw vacatures</h1>
  <img src="/img/bg.png" alt="bg" class="bg">
</div>
<h2>+</h2>
<div class="card-deck">
  @forelse($internship as $i)
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{$i->title}}</h5>
        <p class="card-text">{{$i->description}}</p>
        <a href="{{route('show',[$i->id,$i->slug])}}">
        <button>view</button>
        </a>
      </div>
    </div>
      @empty
      <h1>Je hebt nog geen vacatures!</h1>
  @endforelse
    </div>
    {{$internship->links()}}
@endsection


