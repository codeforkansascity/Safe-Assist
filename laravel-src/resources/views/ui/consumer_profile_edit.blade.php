@extends('layouts.master')

@section('content')
		<div class="update_consumer_form">
		<form action="/profile/update_consumer" method="POST">
			{!! csrf_field() !!}
			<h2>update profile</h2>
			@include('model.form.consumer', ['consumer' => $consumer]) 
			<input type="hidden" name="id" value="{{$consumer->id}}">
			<input type="submit" value="save"/>
		</form>	
		</div>
@stop
