<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Lara-Blog</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="/">Home</a></li>
				<li><a href="/about">About</a></li>
				<li><a href="/posts">Posts</a></li>
				<form action="{{ route('search.posts') }}" method="post" class="navbar-form navbar-left" role="form">
					{{ csrf_field() }}
					<div class="form-group">
						<input type="text" name="search" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
				</form>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@guest
					<li><a href="{{ route('login') }}">Login</a></li>
					<li><a href="{{ route('register') }}">Register</a></li>
				@else
					<li><a href="/posts/create">Create Post</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu">
							<li><a href="/home">Dashboard</a></li>
							<li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault();
	                                       document.getElementById('logout-form').submit();">
									Logout
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
				@endguest
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>
