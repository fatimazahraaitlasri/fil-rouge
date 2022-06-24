@component("layouts.layout")
    @styles("home")

    <div class="home">
        <div class="intro">
            @component("layouts.navigation", ["light" => true])
            @endcomponent
            <form class="filter" action="{{createLink("/properties")}}" method="get">
                <h1 class="header">Discover new amazing places around you</h1>
                <p class="text">
                    Donec vitae dignissim magna, viverra semper justo. Cras blandit enim blandit porta
                    elementum.
                </p>
                <div class="fields">
                    <input class="city" type="text" name="address"
                           placeholder="Search any address, city or country...">
                    <select name="type" id="type">
                        <option value="">All Properties</option>
                        @foreach(["apartment", "hotel"] as $type)
                            <option value="{{$type}}">{{ucfirst($type)}}</option>
                        @endforeach
                    </select>
                    <input type="number" class="guests" placeholder="select guests" name="guests">
                    <button class="submit"><i class="far fa-search"></i></button>
                </div>
            </form>
        </div>

        <div class="entities">
            <h2>Latest Apartments</h2>
            <p class="text">Donec vitae dignissim magna, viverra semper justo. Cras blandit enim blandit porta
                elementum.</p>
            <div class="list">
                @foreach($apartments as $apartment)
                    @component("components.cardItem", ["data" => $apartment])
                    @endcomponent
                @endforeach
            </div>
        </div>
        <div class="entities">
            <h2>Latest Hotels</h2>
            <p class="text">Donec vitae dignissim magna, viverra semper justo. Cras blandit enim blandit porta
                elementum.</p>
            <div class="list">
                @foreach($hotels as $hotel)
                    @component("components.cardItem", ["data" => $hotel])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>

@endcomponent