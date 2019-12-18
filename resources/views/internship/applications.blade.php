@extends('layouts/main')

@section('content')
<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-8 mb-5">
        <div class="card text-center">
          <div class="card-header">
        Applications
          </div>
        @foreach($applicants as $a)
            <h1 id="title_vacature">{{$a->reason}}</h1>
            @foreach($applicants as $u)
            <h1 id="title_vacature">{{$u->firstname}}</h1>

        @endforeach

        @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection