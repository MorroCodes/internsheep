@extends('layouts.main')

@section('content')
<div class="container">
    @if(!empty($error))
        <div class="alert alert-danger">{{$error}}</div>
    @endif
    <form action="" method="GET">
        <div class="form-group">
            <label for="location_filter">Zoek op locatie:</label>
            <input class="form-control" type="search" name="address" id="location_filter" value="{{$request->address}}">
            <label for="tranports_method">Ik ga</label>
            <select class="form-control" name="transport_method" id="transport_method">
                <option value="driving">met de auto</option>
                <option value="cycling" @if ($request->transport_method == "cycling") selected="selected" @endif>met de fiets</option>
                <option value="walking" @if ($request->transport_method == "walking") selected="selected" @endif>te voet</option>
            </select>
            <button type="submit" class="btn btn-primary">Zoek op locatie</button>
        </div>
    </form>
    <div class="d-flex flex-wrap">
        @foreach ($internships as $internship)
        <div class="col-sm-4">
            <div class="card">
                <img src="{{$internship->user->first()->profile_image}}" alt="{{$internship->title}}"
                    class="card-img-top" width="200px">
                <div class="card-body">
                    <h2 class="card-title">{{$internship->title}}</h2>
                    @if ($internship->distance != null)
                    <h5 class="card-text">{{$internship->distance["distance"]}}</h5>
                    <h5 class="card-text">{{$internship->distance["duration"]}}</h5>
                    @endif
                    <p>{{ Str::limit($internship->description, 50) }}</p>
                    <a href="/internship/{{$internship->id}}" class="btn btn-secondary">Bekijk deze vacature</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection