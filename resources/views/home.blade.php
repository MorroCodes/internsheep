@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vind hier een stage die op jouw lijf geschreven staat!</h1>
    <div class="internships">
        @foreach($internships as $i)
            <div class="internship_container">
                    <img src="{{ $i->img }}">
                    <div class="content">
                        <h3>{{ $i->title }}</h3>
                        <a href="/internship/{{ $i->id }}">Meer info</a>
                    </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
