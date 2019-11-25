@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{$internship->title}}</h3>
    <h5>{{$internship->catch_phrase}}</h5>
    <p>{{$internship->description}}</p>
</div>
@endsection
