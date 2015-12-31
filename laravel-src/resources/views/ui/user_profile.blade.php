<!DOCTYPE HTML>

<html>
	<head>
		<title>SafeAssist - Safety Through Information</title>
		@include('includes.head-content')
	</head>
	
	<body id="top">
		@include('includes.header')
		@include('model.user', ['user' => Auth::user()])
		<a href="/profile_edit" class="button special">Edit Profile</a>
		@include('includes.footer')
	</body>
</html>
