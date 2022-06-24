@component("layouts.layout")
    @styles("404")
    <div class="found">
        <h1>{{$code}}</h1>
        <p>{{$message ?? "Page not found"}}</p>
        <a href="{{createLink("/")}}">Go to home page</a>
    </div>
@endcomponent