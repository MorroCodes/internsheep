<div class="form-group hidden">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Passwoord" value="{{Auth::user()->email}}">
</div>
<div class="form-group">
    <label for="password">Huidig wachtwoord</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Passwoord">
</div>
<div class="form-group">
    <label for="inputPassword1">Nieuw wachtwoord</label>
    <input type="password" name="pass1" class="form-control" id="inputPassword1" placeholder="Passwoord">
</div>
<div class="form-group">
    <label for="inputPassword2">Herhaal nieuw wachtwoord</label>
    <input type="password" name="pass2" class="form-control" id="inputPassword2" placeholder="Passwoord">
</div>