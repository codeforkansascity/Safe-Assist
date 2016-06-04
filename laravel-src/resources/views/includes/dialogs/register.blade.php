<dialog id="registerDialog">
<form method="POST" action="/user/register">
    {!! csrf_field() !!}

    @include('model.form.user', ['user' => NULL ])
    @include('model.form.change_password')

    <div>
        <button type="submit">Register</button>
    </div>
</form>
</dialog>
