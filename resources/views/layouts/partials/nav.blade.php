<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
    
    <div class="search-element">
      <form class="input-group mt-1" action="{{route('item.index')}}" method="GET">
      <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search" data-width="250">
      <button class="btn" type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>

  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle">
      <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep">
        <i class="fas fa-shopping-cart"></i>
        @auth
          {{Cart::session(auth()->id())->getContent()->count()}}
        @endauth
      </a>
    </li>

    <!-- Profile -->
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <img alt="image" src="{{asset('stisla-master/assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
      @auth
      <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
      @endauth
      @guest
      <div class="d-sm-none d-lg-inline-block">Hi, Guest</div></a>
      @endguest
      <div class="dropdown-menu dropdown-menu-right">
        <a href="/profile"  class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <a href="features-activities.html" class="dropdown-item has-icon">
          <i class="fas fa-shopping-cart"></i> Cart
        </a>
        <div class="dropdown-divider"></div>
        
        <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> 
          {{ __(' Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>
  </ul>
</nav>