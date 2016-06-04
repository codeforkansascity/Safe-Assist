<div class="consumer_list">
    @foreach ($agencies as $agency)
        @include('model.agency', ['agency' => $agency])
        <a class="button" href="/agency/edit/{{$agency->id}}">edit</a>
    @endforeach
</div>