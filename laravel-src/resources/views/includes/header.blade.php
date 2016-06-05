@include('includes.errors')
@if (!Auth::check()) @include('includes.dialogs.login') @endif
@if (!Auth::check()) @include('includes.dialogs.register') @endif
<header id="header" class="skel-layers-fixed">
	<a href="/" target="_top"><img src="/images/safe-assist-banner.jpg" title="Safe Assist Logo" alt="Safe Assist Logo" /></a>
	<nav id="nav">
		<ul>
			<li><a href="/">Home</a> </li>
			<li><a href="/about">About</a></li>
			@if (Auth::check()) 
				<li><a class="ui-link" href="/user/view">Profile</a></li>
				@if (!Auth::user()->is_agent())
				<li><a class="ui-link" href="/consumer/dashboard">Caregiver</a></li>
				@endif
				@if (Auth::user()->administrator)
					<li><a class="ui-link" href="/admin">Admin</a></li>
				@endif
				@if (Auth::user()->is_agent())
					<li><a class="ui-link" href="/agent">First Responder</a></li>
				@endif
				<li><a id="logout_button" href="/user/logout" class="btn btn-med btn-primary special">Logout</a></li>
			@else 
				<li><a id="enroll_button" class="button special triggersDialog" data-dialog="registerDialog">Enroll</a></li>
				<li><a id="login_button" class="button special triggersDialog" data-dialog="loginDialog">Sign In</a></li>
			@endif	
		</ul>
	</nav>
</header>
