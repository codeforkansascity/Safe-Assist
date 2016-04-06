<div class="consumer_list">
    @foreach ($consumers as $consumer)
        @include('model.consumer', ['consumer' => $consumer])
        @if(Auth::user()->consumers->contains('id', $consumer->id))
            <a class="button" href="/consumer/edit/{{$consumer->id}}">edit</a>
            <form action="/consumer/delete" method="POST">
            	{!! csrf_field() !!}
		<input type="hidden" name="id" value="{{$consumer->id}}"/>
		<input type="submit" value="Delete Consumer" class="button special">
	    </form>
	    @if($consumer->disabled)
            <form action="/consumer/enable" method="POST">
            	{!! csrf_field() !!}
		<input type="hidden" name="id" value="{{$consumer->id}}"/>
		<input type="submit" value="Enable Consumer Profile" class="button special">
	    </form>
	    @else
            <form action="/consumer/disable" method="POST">
            	{!! csrf_field() !!}
		<input type="hidden" name="id" value="{{$consumer->id}}"/>
		<input type="submit" value="Disable Consumer Profile" class="button special">
	    </form>
	    @endif
        @endif
    @endforeach
</div>