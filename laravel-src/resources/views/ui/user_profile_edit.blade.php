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
		
		@include('includes.footer')
	</body>
</html>
