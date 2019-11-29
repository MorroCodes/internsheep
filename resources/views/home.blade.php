@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vind hier een stage die op jouw lijf geschreven staat!</h1>
    <div class="internships">
        <h2>Vacatures</h2>
        @foreach($internship as $i)
            <div class="card internship_container">
                <img src="{{ $i->img }}" class="card-img-top">
                <div class="card-body">
                    <h3 class="card-title">{{ $i->title }}</h3>
                    <a href="/internship/{{ $i->id }}" class="btn btn-primary">Meer info</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
