@extends('layouts.master')

@section('content')
	@include('model.consumer', ['consumer' => $consumer])
	@if (Auth::user()->administrator || Auth::user()->consumers->contains($consumer))
		<a href="/consumer/edit/{{$consumer->id}}" class="button special">Edit Consumer</a>
	@endif

	<h2>Medications</h2>
	<form action="/medicaiton/add" method="POST">
		{!! csrf_field() !!}
		@include('model.form.textfield', ['name' => 'name', 'description' => 'Medication Name',
               'rows' => 4, 'cols' => 50, 'value' =>  NULL])
		<input type="hidden" name="id" value="{{$consumer->id}}"/>
		<input type="submit" value="Add Medication" class="button special">
	</form>

	<h2>Contacts</h2>
	@if($consumer->contacts)
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

	<h2>School</h2>
	@if($consumer->school)
		@include('model.school', ['consumer' => $consumer, 'school' => $consumer->school])
		<a class="button" href="/school/edit/{{ $consumer->school->id }}/{{ $consumer->id }}">Edit</a>
		<form action="/school/release" method="POST">
			{!! csrf_field() !!}
			<input type="hidden" name="id" value="{{$consumer->id}}"/>
			<input type="submit" value="Remove" class="button special">
		</form>
	@else
		<a class="button" href="/school/add/{{ $consumer->id }}">Add School</a>
	@endif

	<h2>Employer</h2>
	@if($consumer->employer)
		@include('model.employer', ['consumer' => $consumer, 'employer' => $consumer->employer])
		<a class="button" href="/employer/edit/{{ $consumer->employer->id }}/{{ $consumer->id }}">Edit</a>
		<form action="/employer/release" method="POST">
			{!! csrf_field() !!}
			<input type="hidden" name="id" value="{{$consumer->id}}"/>
			<input type="submit" value="Remove" class="button special">
		</form>
	@else
		<a class="button" href="/employer/add/{{ $consumer->id }}">Add Employer</a>
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
