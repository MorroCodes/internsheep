@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{ $user->profile_image }}">
    {{ $user->id }}
    {{ $user->firstname }}
    {{ $user->lastname }}
    {{ $user->description }}
</div>
@endsection
