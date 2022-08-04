  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Car<span>Rent</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item {{ Request::is('user/home*') ? 'active' : ''}}"><a href="{{route('user.home')}}" class="nav-link">Home</a></li>
	          <li class="nav-item {{ Request::is('user/about*') ? 'active' : '' }}"><a href="{{route('user.about')}}" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="pricing.html" class="nav-link">Pricing</a></li>
	          <li class="nav-item {{ Request::is('user/cars*') ? 'active' : ''}}"><a href="{{ route('cars.index') }}" class="nav-link">Cars</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item {{ Request::is('user/contact*') ? 'active' : '' }}"><a href="{{ route('user.contact') }}" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
   </nav>