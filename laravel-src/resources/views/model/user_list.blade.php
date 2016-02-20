<div class="user_list">
    @foreach ($users as $user)
        @include('model.user', ['uset' => $user])
        <a class="button" href="/user/edit/{{$user->id}}">edit</a>
    @endforeach
</div>