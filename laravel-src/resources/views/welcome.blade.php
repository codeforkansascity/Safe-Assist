<!DOCTYPE HTML>

<html>
	<head>
		<title>SafeAssist - Safety Through Information</title>
		@include('includes.head')
	</head>
	<body id="top">

		@include('includes.header')
		@include('auth.register')
		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>SafeAssist</h2>
					<p>Where information and safety meet.</p>
					<ul class="actions">
						<li><a id="enroll_button" class="button big special">Enroll</a></li>
						<li><a href="#elements" class="button big alt">Learn More</a></li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1">
				<header class="major">
					<h2>Benefits for the Whole Community</h2>
				</header>
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
