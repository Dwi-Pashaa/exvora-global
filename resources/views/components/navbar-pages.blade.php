<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">
          {{ $companie->name ?? 'Perusahaan' }}
        </h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">Home</a></li>
          <li><a href="">About</a></li>
          <li><a href="">Gallery</a></li>
          <li><a href="">Product</a></li>
          <li><a href="">Blog</a></li>
          <li><a href="">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
    </div>
</header>