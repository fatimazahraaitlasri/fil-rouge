<div @class(["nav", "light" => $light])>
    <a href="{{createLink('/')}}" class=" logo">Bbrikk</a>
    <div class="links">
        @foreach(["all","hotel", "apartment" ] as $type)
            <a href="{{createLink("/properties?".($type == "all" ? "" : "type=$type"))}}"
               class="link">{{$type}}{{$type != "all" ? "s" : "" }}</a>
        @endforeach
    </div>
    <div class="auth">
        @if(Auth::user())
            <a href="{{createLink('/profile')}}" class="link">{{Auth::user()->name}}</a>
            <a href="{{createLink('/logout')}}" class="link">Logout</a>
        @else
            <a href="{{createLink('/login')}}" class="login">
                <i class="fas fa-user"></i>
                <span class="text">sign in</span>
            </a>
        @endif
        @if(!Auth::check() || Auth::check([ROLE_ADMIN, ROLE_HOST]))
            <a href="{{createLink('/properties/create')}}" class="create">host <span>your place</span></a>
        @endif
    </div>
</div>