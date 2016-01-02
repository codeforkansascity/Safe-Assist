@extends('layouts.master')

@section('content')
		<div class="update_consumer_form">
		@if(isset($consumer->id))
		<form action="/profile/update_consumer" method="POST">
		@else
		<form action="/profile/register_consumer" method="POST">
		@endif
			{!! csrf_field() !!}
			<h2>update profile</h2>
			@include('model.form.consumer', ['consumer' => $consumer]) 
			@if(isset($consumer->id))
			<input type="hidden" name="id" value="{{$consumer->id}}">
			@endif

			<input type="submit" value="save"/>
		</form>	
		</div>
@stop
