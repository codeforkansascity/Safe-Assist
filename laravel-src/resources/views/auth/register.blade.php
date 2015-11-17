<!-- resources/views/auth/register.blade.php -->
<dialog class="register">
<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div class="col-md-6">
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div class="col-md-6">
        Street 
        <input type="text" name="street">
    </div>

    <div class="col-md-6">
        City 
        <input type="text" name="city">
    </div>

    <div class="col-md-6">
        State 
        <input type="text" name="state">
    </div>

    <div class="col-md-6">
        Zip 
        <input type="text" name="zip1">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>
</dialog>
