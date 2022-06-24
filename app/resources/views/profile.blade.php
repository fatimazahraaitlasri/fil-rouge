@component("layouts.layout")
    @styles("profile")
    <div class="profile">
        <div class="user">
            <div class="intro">
                <div class="avatar">
                    <img src="{{$user->avatar}}" alt="{{$user->name}}">
                </div>
                <div class="welcome">
                    <h2 class="hello">
                        Hi, I'm {{$user->name}}
                    </h2>
                    <span class="joined">Joined in {{date("Y", strtotime($user->created_at))}}</span>
                </div>
            </div>
            <div class="about">
                <p class="title">About</p>
                <p class="description">{{$user->about}}</p>
            </div>
        </div>
        <div class="properties">
            <p class="title">Properties</p>
            <div class="list">
                @foreach($properties as $property)
                    @component("components.cardItem", ["data" => $property])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>
@endcomponent