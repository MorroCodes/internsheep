@extends('layouts/company')
@section('app')
<div class="card text-center">
  <div class="card-header">
Applications
  </div>
  <div class="card-body">
  @foreach($applicants as $u)
    <h1 id="title_vacature">{{$u->reason}}</h1>

    @endforeach
  </div>
</div>
@endsection


