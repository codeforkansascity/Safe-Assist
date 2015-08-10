<!DOCTYPE HTML>

<html>
	<head>
		<title>SafeAssist - Safety Through Information</title>
		@include('includes.head')
	</head>
	<body id="top">
		<div class='shadowbox'></div>
		@include('includes.header')
		@if (!Auth::check()) @include('auth.register') @endif
		
		
		contact stuff

				
			@include('includes.footer')

	</body>
</html>
