<!DOCTYPE HTML>

<html>
	<head>
		<title>SafeAssist - Safety Through Information</title>
		@include('includes.head-content')
	</head>
	
	
	<body id="top">
		@include('includes.dialogs')
		@include('includes.header')
		
		<div class="update_profile_form">
		<form action="/profile/update_profile" method="POST">
			{!! csrf_field() !!}
			<h2>update profile</h2>
			@include('model.form.user', ['user' => Auth::user()]) 
			<input type="hidden" name="id" value="{{Auth::user()->id}}">
			<input type="submit" value="save"/>
		</form>	
		</div>
		
		<div class="update_password_form">
		<form action="/profile/update_password" method="POST">
			{!! csrf_field() !!}
			<h2>update password</h2>
			@include('model.form.change_password')
			<input type="hidden" name="id" value="{{Auth::user()->id}}">
			<input type="submit" value="save"/>
		</form>
		</div>
		
		
		{{-- todo: allow admins to grant/revoke admin status to other users --}}
	
		@if (Auth::user()->agent)
		<div class="agencies">
			<p>This user is registered as a first responder for the following agencies:</p>
			@foreach (Auth::user()->agencies as $agency)
				<form action="/user/revoke_admin" method="POST">
				@include('model.forms.agency')
				</form>
			@endforeach
			
		</div>
		@endif
	
		<form action="/user/grant_admin">
		{{-- todo: add agency form --}}
		</form>
		
		@include('includes.footer')
	</body>
</html>
