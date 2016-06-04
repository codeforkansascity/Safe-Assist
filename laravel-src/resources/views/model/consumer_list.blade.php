<div class="consumer_list">
    @foreach ($consumers as $consumer)
		<a href="/consumer/view/{{$consumer->id}}">
        	@include('model.consumer', ['consumer' => $consumer])
		</a>
    @endforeach
</div>