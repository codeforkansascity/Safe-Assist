<div class="consumer_list">
    @foreach ($consumers as $consumer)
        @include('model.consumer', ['consumer' => $consumer])
        @if(Auth::user()->consumers->contains('id', $consumer->id))
            <a class="button" href="/consumer/edit/{{$consumer->id}}">edit</a>
        @endif
    @endforeach
</div>