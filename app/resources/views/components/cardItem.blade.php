@styles("card")
@php
    $link = createLink("/apartments/$data->id");
@endphp
<div class="card">
    <a href="{{$link}}" class="img"><img src="{{$data->image}}" alt="{{$data->name}}"></a>
    <div class="main">
        <a class="name" href="{{$link}}">{{ $data->name }}</a>
        <div class="info">
            <span class="price">{{ $data->price }}$</span>
            <span class="location">{{ $data->city }}, {{ $data->country }}</span>
        </div>
    </div>
</div>