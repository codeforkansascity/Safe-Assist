<!DOCTYPE HTML>

<html>
	<head>
		<title>SafeAssist - Safety Through Information</title>
		@include('includes.head-content')
	</head>
	<body id="top">
		@include('includes.dialogs')
		@include('includes.header')
		
		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>SafeAssist</h2>
					<p>Where information and safety meet.</p>
					@if (Auth::check()) 
					<p>Welcome, {!! Auth::user()->email !!}</p> 
					@endif
					<ul class="actions">
					@if (!Auth::check()) 
						<li><a id="enroll_button" class="button big special">Enroll</a></li>
						<li><a href="#elements" class="button big alt">Learn More</a></li>
					@else 
						@if (Auth::user()->administrator)
						<li><a class="button big special">Administrator Menu</a></li>
						@endif
						
						@if (Auth::user()->agent)
						<li><a id="" class="button big special">First Responder Menu</a></li>
						@endif
						
						<li><a id="" class="button big special">Caregiver Menu</a></li>
					@endif
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1">
				<div class="header"><div class="major">
					<h2>Benefits for the Whole Community</h2>
				</div></div>
				<div class="container">
					<div class="row">
						<div class="4u">
							<section class="special box">
								<i class="icon fa-heart major"></i>
								<h3>Caregivers</h3>
								<p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<i class="icon fa-group major"></i>
								<h3>Community</h3>
								<p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<i class="icon fa-plus major"></i>
								<h3>First Responders</h3>
								<p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
							</section>
						</div>
					</div>
				</div>
			</section>
				
			@include('includes.footer')

	</body>
</html>
