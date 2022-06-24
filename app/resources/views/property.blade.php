@component("layouts.layout")
    @styles("property")
    <div class="property">
        <div class="intro">
            <div class="main">
                <h2 class="name">{{ $property->name }}</h2>
                <p class="address">{{ $property->address }}, {{ $property->city }} - {{ $property->country }}</p>
            </div>
            <p class="price">${{ $property->price }}->night</p>
        </div>
        <div class="img">
            <img src="{{$property->image}}" alt="{{$property->name}}">
        </div>
        <div class="description">
            <p class="title">description</p>
            <p class="text">{{ $property->description }}</p>
        </div>
    </div>
@endcomponent