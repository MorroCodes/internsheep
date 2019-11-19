@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($internships as $i)
        <div class="internship_container">
            <a href="/internship/{{ $i->id }}">
                <img src="{{ $i->img }}">
                <h2>{{ $i->title }}</h2>
            </a>
        </div>
    @endforeach
</div>
@endsection
