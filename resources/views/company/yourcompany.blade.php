@extends('layouts/main')

@section('content')
<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8 mb-5">

          <div class="title-flex">
              <h1 class="page-title-flex">Jouw vacatures</h1>
              <a href="{{route('internship.create')}}">
                  <button class="btn btn-primary">Toevoegen</button>
              </a>
          </div>

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

      </div>  
    </div>  
  </div>  
</div>
@endsection


