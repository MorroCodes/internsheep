@extends('layouts/entry')
@section('content')
    <form action="" method="post">
    
    <div>
        <input type="email" placeholder="E-mail">
    </div>
    
    <div>
        <input type="password" placeholder="Wachtwoord">
    </div>

    <div>
        <input type="submit" value="Aanmelden">
    </div>

    {{csrf_field()}}
    </form>
@endsection