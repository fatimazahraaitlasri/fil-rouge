<div class="navigation">
    <div>logo</div>
    <div class="links">
        <a href="/hotels">hotels</a>
        <a href="/apartments">apartments</a>
    </div>

    <div class="auth">
        @if(Auth::check())
            <a href="/logout">logout</a>
        @else
            <a href="/login">login</a>
        @endif
        <a href="/host">
            <i class="fas fa-user"></i>
            host your place
        </a>
    </div>

</div>