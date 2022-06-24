@component("layouts.layout")
    @styles("home")
    <div class="home">
        <div class="intro">
            @component("layouts.navigation", ["light" => true])
            @endcomponent
            <form class="filter" @submit.prevent="handleSubmit">
                <h1 class="header">Discover new amazing places around you</h1>
                <p class="text">
                    Donec vitae dignissim magna, viverra semper justo. Cras blandit enim blandit porta
                    elementum.
                </p>
                <div class="fields">
                    <input class="city" type="text" name="address"
                           placeholder="Search any address, zip code or city...">
                    <input type="number" class="guests" placeholder="select guests" name="guests">
                    <button class="submit"><i class="far fa-search"></i></button>
                </div>
            </form>
        </div>

        <div class="entities">
            <h2>Apartments in Marrakech</h2>
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
            <h2>Apartments in Marrakech</h2>
            <p class="text">Donec vitae dignissim magna, viverra semper justo. Cras blandit enim blandit porta
                elementum.</p>
            <div class="list">
                @foreach($apartments as $apartment)
                    @component("components.cardItem", ["data" => $apartment])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>

@endcomponent