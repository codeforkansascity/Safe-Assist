<!-- resources/views/auth/login.blade.php -->

<div class="backdrop"></div>
<div class="login">
    <h1>Login</h1>
    <form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password" id="password">
    </div>

    <div>
        <span>
            <input type="checkbox" name="remember">
            <label for="checkbox">remember me</label>
        </span>
    </div>

    <div>
        <button type="submit" value="log in">Login</button>
    </div>
    </form>
</div>
