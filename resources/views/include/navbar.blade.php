<nav class="navbar navbar-expand-lg ">
  <div class="container">
      <a class="navbar-brand" href="#"><img src="{{url('front_end/assets/image/logo.png')}}" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-lg-auto">
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{route('more.index')}}">Package</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link ">Disabled</a>
              </li>
          </ul>
          @guest
            <a href="{{route('login')}}" class="btn btn-success me-4">Login</a>
          @endguest
          @auth

          <div class="dropdown">
            <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->name}}
            </a>
          
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
            </ul>
          </div>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          @endauth
      </div>
  </div>
</nav>