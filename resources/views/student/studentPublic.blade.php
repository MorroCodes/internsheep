@extends('layouts/main')

@section('content')
<!-- <div class="container">
    <img src="{{ $user->profile_image }}">
    <h3>{{ $user->firstname }} {{ $user->lastname }}</h3>
    <p>{{ $user->description }}</p>
</div> -->

<div class="site-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
            <div class="p-5 bg-white">

              <div class="profile-picture-container" style="background-image: url({{asset($user->profile_image)}})"></div>
              <h5 class="main-title main-title-big">{{$user->firstname}} {{$user->lastname}}</h5>

              <h5 class="main-title">Beschrijving</h5>
              <p>{{$user->description}}</p>

              <h5 class="main-title">School</h5>
              <p>{{$user->school}}</p>

              <h5 class="main-title">Studierichting</h5>
              <p>{{$user->field_of_study}}</p>

            </div>

          </div>

          <div class="col-lg-4">
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
