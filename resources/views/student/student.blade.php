@extends('layouts/main')

@section('content')
<div class="container profile">
    <img src="{{ $user->profile_image }}">
    <h3>{{ $user->firstname }} {{ $user->lastname }}</h3>
    <p>{{ $user->description }}</p>
</div>
@endsection
