<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
            <img class="img-profile rounded-circle" src="{{ asset('template/img/boy.png') }}" style="max-width: 60px">
            @auth
                <span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
            @endauth
            @guest
                <span class="ml-2 d-none d-lg-inline text-white small">Guest</span>
            @endguest
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            @auth    
                <a class="dropdown-item" href="{{ route('profile.index') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
            @endauth
            <div class="dropdown-divider"></div>
            @if (Auth::check())
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Logout') }}
                </a>
            @else    
                <a class="dropdown-item" href="{{ route('login') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Login') }}
                </a>
            @endif
        </div>
        </li>
    </ul>
</nav>