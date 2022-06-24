@component("layouts.layout")
    @styles("auth")
    {{--    registeration form with fields name|email|password|type of account--}}
    <div class="authForm">
        <h1>Sign up</h1>
        <form action="#" method="post" class="form">
            @if($error ?? false)
                <div class="error">{{$error}}</div>
            @endif
            <div class="input">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="input">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="input">
                <label for="phone">Your Phone Number</label>
                <input type="tel" name="phone" id="phone" required>
            </div>
            <div class="input">
                <label for="type">Account Type</label>
                <select name="role" id="type">
                    <option value="guest">guest</option>
                    <option value="host">host</option>
                </select>
            </div>
            <button type="submit">Sign up</button>
            <p class="other">
                Already a member? <a href="{{createLink('/login')}}" class="link">Sign in</a>
            </p>
        </form>
    </div>
@endcomponent