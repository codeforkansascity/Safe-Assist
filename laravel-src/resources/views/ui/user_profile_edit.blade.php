@extends('layouts.master')

@section('content')
		<div class="update_profile_form">
		<form action="/user/update" method="POST">
			{!! csrf_field() !!}
			<h2>update profile</h2>
			@include('model.form.user', ['user' => $user]) 
			<input type="hidden" name="id" value="{{$user->id}}">
			<input type="submit" value="save"/>
		</form>	
		</div>
		
		<div class="update_password_form">
		<form action="/user/update_password" method="POST">
			{!! csrf_field() !!}
			<h2>update password</h2>
			@include('model.form.change_password')
			<input type="hidden" name="id" value="{{$user->id}}">
			<input type="submit" value="save"/>
		</form>
		</div>
		
		
		{{-- todo: allow admins to grant/revoke admin status to other users --}}
	
		@if ($user->agent)
		<div class="agencies">
			<p>This user is registered as a first responder for the following agencies:</p>
			@foreach ($user()->agencies as $agency)
				<form action="/user/revoke_admin" method="POST">
				@include('model.forms.agency')
				</form>
			@endforeach
			
		</div>
		@endif
	
		<form action="/user/grant_admin">
		{{-- todo: add agency form --}}
		</form>
@stop
