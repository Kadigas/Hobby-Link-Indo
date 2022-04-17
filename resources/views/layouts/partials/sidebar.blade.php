<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index">HobbyLinkIndo</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index">HLI</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>  
        @auth
          @if(Route::current()->getName() == 'profile.index')
          <li class="active"><a class="nav-link" href="{{route('profile.index')}}"><i class="fas fa-user"></i> <span>Profile</span></a></li>
        @else
          <li><a class="nav-link" href="{{route('profile.index')}}"><i class="fas fa-user"></i> <span>Profile</span></a></li>
        @endif
        @endauth
          


        @if(Route::current()->getName() == 'category.index')
        <li class="active"><a class="nav-link" href="{{route('category.index')}}"><i class="fas fa-tags"></i> <span>Category</span></a></li>
      @else
        <li><a class="nav-link" href="{{route('category.index')}}"><i class="fas fa-tags"></i> <span>Category</span></a></li>
      @endif  

      @if(Route::current()->getName() == 'item.index')
        <li class="active"><a class="nav-link" href="{{route('item.index')}}"><i class="fas fa-compact-disc"></i> <span>Item</span></a></li>
      @else
        <li><a class="nav-link" href="{{route('item.index')}}"><i class="fas fa-compact-disc"></i> <span>Item</span></a></li>
      @endif  

      @if(Route::current()->getName() == 'cart.index')
        <li class="active"><a class="nav-link" href="{{route('cart.index')}}"><i class="fas fa-shopping-cart"></i> <span>Cart</span></a></li>
      @else
        <li><a class="nav-link" href="{{route('cart.index')}}"><i class="fas fa-shopping-cart"></i> <span>Cart</span></a></li>
      @endif  

      
      @guest
      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="/login" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-sign-in-alt"></i> Login
        </a>
        <a href="/register" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-book"></i> Register
        </a>
      </div>
      @endguest
      @auth
      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a class="btn btn-danger btn-lg btn-block btn-icon-split" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
         
         <i class="fas fa-sign-out-alt"></i> 
         {{ __(' Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
      @endauth

      
  </aside>
</div>