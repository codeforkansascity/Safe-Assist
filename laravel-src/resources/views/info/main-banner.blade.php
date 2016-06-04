<section id="banner">
	<div class="inner">
		<h2>SafeAssist</h2>
		<p>Where information and safety meet.</p>
		@if (Auth::check()) 
			<p>Welcome, {!! Auth::user()->email !!}</p> 
		@endif

		@if (!Auth::check()) 
			<a id="enroll_button" class="btn btn-primary btn-lg">Enroll</a>
		@else 
			<a href="caregiver" class="btn btn-danger btn-lg">Caregiver Menu</a>
		@endif
			<a href="#elements" class="btn btn-primary btn-lg">Learn More</a>
	</div>
</section>





