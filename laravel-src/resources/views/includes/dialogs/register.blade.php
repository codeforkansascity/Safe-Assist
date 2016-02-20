<dialog id="registerDialog">
<form method="POST" action="/user/register">
    {!! csrf_field() !!}

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>
    
    @include('model.form.change_password')
    @include('model.form.address', ['address' => new App\Address])

    <div>
        <button type="submit">Register</button>
    </div>
</form>
</dialog>
