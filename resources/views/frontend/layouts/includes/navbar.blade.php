  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="#">Rent<span>Car</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item {{ Request::is('/*') ? 'active' : ''}}"><a href="{{route('home')}}" class="nav-link">Home</a></li>
	          <li class="nav-item {{ Request::is('about*') ? 'active' : '' }}"><a href="{{route('about')}}" class="nav-link">About</a></li>
	          <li class="nav-item {{ Request::is('cars*') ? 'active' : ''}}"><a href="{{ route('cars') }}" class="nav-link">Cars</a></li>
	          <li class="nav-item {{ Request::is('contact*') ? 'active' : '' }}"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
			  <li class="nav-item">
			    @if (Route::has('login'))
                    @auth
					<li class="nav-item dropdown">
                    <a class="nav-link" style="color: blue; font-weight:bold;" data-toggle="dropdown" href="#">
		            {{ Auth::user()->name }}
                    </a>
					<div class="dropdown-menu dropdown-menu dropdown-menu-right">
					  <a href="#" class="dropdown-item">
                        <a href="{{ route('riwayat', Auth::user()->id ) }}" class="btn text-success text-center" style="font-weight: bold; width: 100%">Riwayat</a>
                        <hr>
						<a class="nav-link text-dark text-center" style="font-weight:bold;" href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();" role="button">
						<i class="fas fa-sign-out-alt text-primary"> Logout</i>
						</a>
						<form action="{{ route('logout') }}" id="logout-form" method="post">
						@csrf
						</form>
					  </a>
					</li>
                    @else
                        <a href="{{ route('login') }}" style="color: blue; font-weight:bold;" class="nav-link">Log in</a>
					@endauth
                  @endif
			    </li>
	        </ul>
	    </div>
	</div>
</nav>
