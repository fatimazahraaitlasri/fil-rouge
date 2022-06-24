@component("layouts.layout")
    @styles("auth")
    <div class="authForm">
        <h1>{{$title}}</h1>
        <form action="#" method="post" class="form">
            @if($error ?? false)
                <div class="error">{{$error}}</div>
            @endif
            <div class="input">
                <label for="name">Name</label>
                <input value="{{$user->name ?? ""}}" type="text" name="name" id="name" required>
            </div>
            <div class="input">
                <label for="avatar">Avatar</label>
                <input value="{{$user->avatar ?? ""}}" type="text" name="avatar" id="avatar">
            </div>
            <div class="input">
                <label for="phone">Your Phone Number</label>
                <input value="{{$user->phone ?? ""}}" type="tel" name="phone" id="phone" required>
            </div>
            <div class="input">
                <label for="about">About</label>
                <textarea name="about" id="about" cols="30" rows="10"
                >{{$user->about ?? ""}}</textarea>
            </div>
            <button type="submit">{{$button}}</button>
        </form>
    </div>
@endcomponent