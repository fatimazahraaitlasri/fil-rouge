@component("layouts.layout")
    @styles("property")
    <div class="property">
        @if(Auth::check() && (Auth::user()->id == $owner->id || Auth::check(ROLE_ADMIN)) )
            <div class="controls">
                <a href="{{createLink("/properties/delete/$property->id")}}">Delete</a>
                <a href="{{createLink("/properties/update/$property->id")}}">Edit</a>
            </div>
        @endif
        <div class="intro">
            <div class="main">
                <h2 class="name">{{ $property->name }}</h2>
                <p class="address">{{ $property->address }}, {{ $property->city }} - {{ $property->country }}</p>
            </div>
            <p class="price">${{ $property->price }}/night</p>
        </div>
        <div class="img">
            <img src="{{$property->image}}" alt="{{$property->name}}">
        </div>
        <div class="more">
            <ul class="info">
                <li>{{ $property->guests }} guests</li>
                <li>{{ ucfirst($property->type) }}</li>
                <li>Phone ({{ $owner->phone }})</li>
            </ul>
            <a class="avatar" href="{{createLink("/users/profile/$owner->id")}}">
                @if($owner->avatar)
                    <img src="{{$owner->avatar}}" alt="{{$owner->name}}">
                @else
                    <i class="fas fa-user"></i>
                @endif
            </a>
        </div>
        <div class="description">
            <p class="title">description</p>
            <p class="text">{{ $property->description }}</p>
        </div>


        <div class="comments">
            @if(Auth::check())
                <form action="{{createLink('/comments/create/'.$property->id)}}" method="post">
                    <label for="comment">Your Comment</label>
                    <textarea placeholder="What's on your mind?" name="comment" id="comment" cols="30"
                              rows="5"></textarea>
                    <button type="submit">submit</button>
                </form>
            @endif
            @if(count($comments))
                <p class="title">comments ({{count($comments)}})</p>

                <div class="list">
                    @foreach($comments as $comment)
                        <div class="comment">
                            <a href="{{createLink("/users/profile/".$comment->author->id)}}" class="user">
                                <div class="avatar">
                                    @if($comment->author->avatar)
                                        <img src="{{$comment->author->avatar}}" alt="{{$comment->author->name}}">
                                    @else
                                        <i class="fas fa-user"></i>
                                    @endif
                                </div>
                                <p class="name">{{$comment->author->name }}</p>
                            </a>
                            <p class="text">{{$comment->content}}</p>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
@endcomponent