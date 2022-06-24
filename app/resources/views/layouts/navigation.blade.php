<div @class(["nav", "light" => $light])>
    <a href="{{createLink('/')}}" class=" logo">Bbrikk</a>
    <div class="links">
        {{--        <a href="{{createLink('/properties?type=hotels')}}">hotels</a>--}}
        {{--        <a href="{{createLink('/apartments')}}">apartments</a>--}}
        @foreach(["hotel", "apartment"] as $type)
            <a href="{{createLink("/properties?type=$type")}}"
               class="link">{{$type}}s</a>
        @endforeach
    </div>
    <div class="auth">
        <a href="{{createLink('/login')}}" class="login">
            <i class="fas fa-user"></i>
            <span class="text">sign in</span>
        </a>
        <a href="{{createLink('/properties/create')}}" class="create">host <span>your place</span></a>
    </div>
</div>