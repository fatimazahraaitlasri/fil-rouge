@component("layouts.layout")
    @styles("auth")
    <div class="authForm">
        <h1>Sign in</h1>
        <form action="#" method="post" class="form">
            @if($error ?? false)
                <div class="error">{{$error}}</div>
            @endif
            <div class="input">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Sign in</button>
            <p class="other">
                Not a member? <a href="{{createLink('/register')}}" class="link">Create an account</a>
            </p>
        </form>
    </div>
@endcomponent