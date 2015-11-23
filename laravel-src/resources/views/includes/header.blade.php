		<!-- Header -->
		
			@if (count($errors) > 0)
				<div class="error_message">
					<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
					</ul>
				</div>
			@endif
			
			@if (!Auth::check()) @include('auth.login') @endif
			
			
			<header id="header" class="skel-layers-fixed">
			
				

				<a href="/" target="_top"><img src="images/safe-assist-banner.jpg" title="Safe Assist Logo" alt="Safe Assist Logo" /></a>
				<nav id="nav">
					<ul>
						<li><a href="/">Home</a> </li>
						<li><a href="/about">About</a></li>
						<li><a href="/contact">Contact</a></li>
						<li><a href="/partners">Partners</a></li>
						@if (!Auth::check()) <li><a id="login_button" class="button special">Sign In</a></li>
						@else <li><a id="logout_button" href="auth/logout" class="button special">Logout</a></li>
						@endif
							
					</ul>
				</nav>
			</header>
