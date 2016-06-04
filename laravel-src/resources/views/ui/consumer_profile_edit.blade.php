@extends('layouts.master')

@section('content')
		<div class="update_consumer_form">
		@if(isset($consumer->id))
		<form action="/consumer/update" method="POST">
		@else
		<form action="/consumer/register" method="POST">
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
