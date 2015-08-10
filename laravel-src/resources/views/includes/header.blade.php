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
			
				

				<a href="index.html" target="_top"><img src="images/safe-assist-banner.jpg" title="Safe Assist Logo" alt="Safe Assist Logo" /></a>
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="left-sidebar.html">About</a></li>
						<li><a href="right-sidebar.html">Contact</a></li>
						<li><a href="no-sidebar.html">Partners</a></li>
						@if (!Auth::check()) <li><a id="login_button" class="button special">Sign In</a></li>
						@else <li><a id="logout_button" href="auth/logout" class="button special">Logout</a></li>
						@endif
							
					</ul>
				</nav>
			</header>
