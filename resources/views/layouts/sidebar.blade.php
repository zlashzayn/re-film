<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
      <div class="sidebar-brand-icon">
        <img src="{{ asset('template/img/logo/logo3.png') }}">
      </div>
      <div class="sidebar-brand-text mx-3">Re-Film</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
      <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('film.index') }}">
            <i class="fa-solid fa-film"></i>
            <span>Film</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="ui-colors.html">
            <i class="fa-solid fa-clapperboard"></i>
            <span>Pemeran</span>
        </a>
    </li>
    @auth    
        <li class="nav-item">
            <a class="nav-link" href="{{ route('genre.index') }}">
                <i class="fa-solid fa-masks-theater"></i>
                <span>Genre</span>
            </a>
        </li>
    @endauth
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>