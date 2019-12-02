@guest
    <nav>
        <a href="/login">Login</a>
        or
        <a href="/signup" class="btn btn-primary">Signup</a>
    </nav>
@endguest

@auth
    <nav>
        @if ()
            
        @endif
        Jij bent cool
    </nav>
@endauth