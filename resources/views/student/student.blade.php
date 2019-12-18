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
              <h5 class="main-title">School</h5>
              <p>{{$studentInfo->school}}</p>
              <h5 class="main-title">Studeer richting</h5>
              <p>{{$studentInfo->field_of_study}}</p>
              <h5 class="main-title">Download CV</h5>
              <a href="{{$studentInfo->cv}}"><button class="btn btn-primary cv" type="button">Download cv</button></a>
            </div>
          </div>
          <div class="col-lg-4">
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
