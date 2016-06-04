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
		@else 
			<li><a href="caregiver" class="button big special">Caregiver Menu</a></li>
		@endif
			<li><a href="#elements" class="button big alt">Learn More</a></li>
		</ul>
	</div>
</section>
