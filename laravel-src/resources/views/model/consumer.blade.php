<section class="consumer_profile {{$consumer->disabled ? 'disabled_consumer_profile' : ''}}">
	<div class="first_name">{{$consumer->first_name}}</div>
	<div class="last_name">{{$consumer->last_name}}</div>
	<div class="description">{{$consumer->description}}</div>
	@include('model.address', ['address' => $consumer->address])
</section>
