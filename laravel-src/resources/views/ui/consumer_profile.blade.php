@extends('layouts.master')

@section('content')
	@include('model.consumer', ['consumer' => $consumer])
	@if (Auth::user()->administrator || Auth::user()->consumers->contains($consumer))
		<a href="/consumer/edit/{{$consumer->id}}" class="button special">Edit Consumer</a>
	@endif

	@if (Auth::user()->consumers->contains($consumer))
		<form action="/consumer/delete" method="POST">
			{!! csrf_field() !!}
			<input type="hidden" name="id" value="{{$consumer->id}}"/>
			<input type="submit" value="Delete Consumer" class="button special">
		</form>
	@endif
@stop
