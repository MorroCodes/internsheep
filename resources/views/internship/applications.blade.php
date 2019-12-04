@extends('layouts/company')

@section('app')
<div class="card text-center">
  <div class="card-header">
Applications
  </div>
@foreach($applicants as $a)
    <h1 id="title_vacature">{{$a->reason}}</h1>

 @endforeach
  </div>
</div>
@endsection