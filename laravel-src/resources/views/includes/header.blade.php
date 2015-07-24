		<!-- Header -->
		
			@include('auth.login')
			
			<header id="header" class="skel-layers-fixed">
				<a href="index.html" target="_top"><img src="images/safe-assist-banner.jpg" title="Safe Assist Logo" alt="Safe Assist Logo" /></a>
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="left-sidebar.html">About</a></li>
						<li><a href="right-sidebar.html">Contact</a></li>
						<li><a href="no-sidebar.html">Partners</a></li>
						<?php if(!Auth::check()) { ?><li><a id="login_button" class="button special">Sign In</a></li>
						<?php } else { ?><li><a id="logout_button" href="auth/logout" class="button special">Logout</a></li>
						<?php } ?>
							
					</ul>
				</nav>
			</header>
			
