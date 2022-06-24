@component("layouts.layout")
    @styles("properties")
    <div class="properties">
        <div class="entities">
            <h2>{{$title}}</h2>
            <p class="text">Donec vitae dignissim magna, viverra semper justo. Cras blandit enim blandit porta
                elementum.</p>
            <div class="list">
                @foreach($properties as $property)
                    @component("components.cardItem", ["data" => $property])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>
@endcomponent