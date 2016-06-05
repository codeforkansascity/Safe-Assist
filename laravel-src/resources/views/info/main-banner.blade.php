<section id="banner">
	<div class="inner">
		<h2>SafeAssist</h2>
		<p>Where information and safety meet.</p>
		@if (Auth::check()) 
			<p>Welcome, {!! Auth::user()->email !!}</p> 
		@endif
	</div>
</section>





