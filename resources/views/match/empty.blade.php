@extends('layouts.main')

@section('content')
<div class="container">
    @if(!empty($error))
        <div class="alert alert-danger">{{$error}}</div>
    @endif
    @component('components/search')
        @if (isset($request->searchFor))
            @slot('searchFor')
                {{$request->searchFor}}
            @endslot
        @endif
        @if (isset($request->address))
                @slot('address')
                    {{$request->address}}
                @endslot
            @endif
        @if (isset($request->transport_method))
            @slot('transport_method')
                {{$request->transport_method}}
            @endslot
        @endif
    @endcomponent
    <div class="d-flex flex-wrap">
        @foreach ($internships as $internship)
        <div class="col-sm-4">
            <div class="card">
                <img src="{{$internship->user->first()->profile_image}}" alt="{{$internship->title}}"
                    class="card-img-top" width="200px">
                <div class="card-body">
                    <h2 class="card-title">{{$internship->title}}</h2>
                    <p>{{ Str::limit($internship->description, 50) }}</p>
                    <a href="/internship/{{$internship->id}}" class="btn btn-secondary">Bekijk deze vacature</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection