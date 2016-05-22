@extends('layouts.master')

@section('content')
	@include('model.consumer', ['consumer' => $consumer])
	@if (Auth::user()->administrator || Auth::user()->consumers->contains($consumer))
		<a href="/consumer/edit/{{$consumer->id}}" class="button special">Edit Consumer</a>
	@endif

	@if($consumer->contacts)
		<h2>Contacts</h2>
		@foreach($consumer->contacts as $contact)
			@include('model.contact', ['contact' => $contact])
			@if (Auth::user()->consumers->contains($consumer))
				<a class="button" href="/contact/edit/{{ $contact->id }}/{{ $consumer->id }}">Edit Contact</a>
				<form action="/contact/delete" method="POST">
					{!! csrf_field() !!}
					<input type="hidden" name="consumer_id" value="{{$consumer->id}}"/>
					<input type="hidden" name="id" value="{{$contact->id}}"/>
					<input type="submit" value="Delete Contact" class="button special">
				</form>
			@endif
		@endforeach
	@endif

	@if (Auth::user()->consumers->contains($consumer))
	<a class="button" href="/contact/add/{{ $consumer->id }}">Add Contact</a>
	@endif

	@if (Auth::user()->consumers->contains($consumer))
		<form action="/consumer/delete" method="POST">
			{!! csrf_field() !!}
			<input type="hidden" name="id" value="{{$consumer->id}}"/>
			<input type="submit" value="Delete Consumer" class="button special">
		</form>
	@endif

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
@stop
