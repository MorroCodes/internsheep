@extends('layouts.main')

@section('content')

<div class="site-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
            <div class="p-5 bg-white">

            <img src="{{ $user->profile_image }}">
              <h5 class="main-title main-title-big">{{$user->firstname}} {{$user->lastname}}</h5>
              <h5 class="main-title">Bio</h5>
              <p>{{$user->description}}</p>

              <h5 class="main-title">Contact</h5>
              <p>{{$user->email}}</p>
            </div>
          </div>
          <div class="col-lg-4">
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
