@extends('layouts/entry')

@section('content')
<div class="container">
    <h3>{{$internship->title}}</h3>
    <h6>{{$internship->company['company_name']}}</h6>
    <h5>{{$internship->catch_phrase}}</h5>
    <p>{{$internship->description}}</p>
</div>
@endsection
