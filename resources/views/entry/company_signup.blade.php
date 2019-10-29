@extends('layouts/entry')
@section('content')
    <div>
        <h2>Registreer als student</h2>
        <a href="">Registreer met facebook</a>

        <form>
            <div class="form-group">
                <label for="firstname">Voornaam</label>
                <input type="text" placeholder="Voornaam" name="firstname" class="form-control">
            </div>

            <div class="form-group">
                <label for="lastname">Achternaam</label>
                <input type="text" placeholder="Achternaam" name="lastname" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" placeholder="E-mail" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="company_name">Bedrijfsnaam</label>
                <input type="text" placeholder="Bedrijfsnaam" name="company_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="company_bio">Korte bedrijfsomschrijving</label>
                <input type="text" placeholder="Omschrijving" name="company_bio" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" placeholder="********" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_repeat">Herhaal wachtwoord</label>
                <input type="password" placeholder="********" name="password_repeat" class="form-control">
            </div>

            <a href="/login">Heb je al een profiel? Meld hier aan.</a>

            <div class="form-group">
                <a href="/signup" class="btn btn-light">Vorige</a>
                <input type="submit" value="Registreer als bedrijf" class="btn btn-primary">
            </div>

            {{csrf_field()}}
        </form>
    </div>
@endsection