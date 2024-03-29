@component("layouts.layout")
    @styles("profile")
    <div class="profile">
        <div class="user">
            <div class="intro">
                <div class="avatar">
                    @if($user->avatar)
                        <img src="{{$user->avatar}}" alt="avatar">
                    @else
                        <i class="fas fa-user"></i>
                    @endif
                </div>
                <div class="welcome">
                    <h2 class="hello">
                        Hi, I'm {{$user->name}}
                    </h2>
                    <span class="joined">Phone: ({{$user->phone}})</span>
                    <span class="joined">Joined in {{date("Y", strtotime($user->created_at))}}</span>
                </div>
                @if(Auth::user() && Auth::user()->id == $user->id)
                    <a href="{{createLink('/account')}}" class="edit">edit profile</a>
                @endif
            </div>
            @if($user->about)
                <div class="about">
                    <p class="title">About</p>
                    <p class="description">{{$user->about}}</p>
                </div>
            @endif
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