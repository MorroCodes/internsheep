@extends('layouts/app')

@section('content')
<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8 mb-5">
          <div class="container">
    <h3>{{$internship->title}}</h3>
    <h5>{{$internship->catch_phrase}}</h5>
    <p>{{$internship->description}}</p>
</div>

    <form action="{{ action('AccountController@ApplyInternship') }}" method="post">

        <input type="hidden" name="company" value="{{$internship->company_id}}">
        <input type="hidden" name="internship" value="{{$internship->id}}">
        <div class="form-group">
            <label for="reason">Waarom wil je hier stage doen?</label>
            <textarea name="reason" class="form-control" id="reason"></textarea>
        </div>
        <apply-component :jobId={{$internship->id}}></apply-component>
        {{csrf_field()}}
    </form>



@endsection
