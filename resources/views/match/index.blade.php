@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($companySurveys as $companySurvey)
        @foreach ($companySurvey->internships as $internship)
            <h2>{{$internship->title}}</h2>
            <h5>{{$companySurvey->match}}% overeenkomst</h5>
            <p>{{$internship->description}}</p>
            <img src="{{$internship->img}}" alt="{{$internship->title}}" width="300px" height="200px">
        @endforeach
    @endforeach
</div>
@endsection
