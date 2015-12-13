<!DOCTYPE HTML>

<html>
	<head>
		<title>SafeAssist - Safety Through Information</title>
		@include('includes.head-content')
	</head>
	<body id="top">
		@include('includes.dialogs')
		@include('includes.header')
		**{!! Auth::user()->administrator !!}**
		
		<pre>{!! print_r(Auth::user()->address) !!}</pre>
				
			@include('includes.footer')

	</body>
</html>
