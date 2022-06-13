<nav class="nav">
    @php
        $routes = ["home","hotels","apartments"]
    @endphp
    <div><img src="https://static.locatme.fr/img/icone-refonte/logo/watermark_petit.png" alt=""></div>
    <div class="intro">
        <div>
            <ul>
                <div>
                    @foreach($routes as $index => $route)
                        <li><a href="{{createLink(!$index ? "/" : "/$route")}}">{{$route}}</a></li>
                    @endforeach
                </div>
                <div>
                    <li><a href=""><i class="fa fa-user"></i></a></li>
                    <li><a href="">sign in</a></li>
                    <li><a href=""><button>Host your place</button></a></li>
                </div>

            </ul>
        </div>
    </div>
</nav>
<div x-data="{ open: false }" @click="open = !open">
    <div class="img"><img src="https://static.locatme.fr/img/icone-refonte/logo/watermark_petit.png" alt=""></div>

    <span class="btn-ouvrir" ><i class="fas fa-bars"></i></span>
    <div class="nav-mobile" x-show="open">
        <span class="btn-fermer"><i class="fas fa-times"></i></span>
        <ul class="mobile-menu">

            @foreach($routes as $index => $route)
                <li><a href="{{createLink(!$index ? "/" : "/$route")}}">{{$route}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
