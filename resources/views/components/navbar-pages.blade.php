<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
          <h1 class="sitename desktop-logo">
              {{ $companie->name ?? 'Perusahaan' }}
          </h1>
          <img src="{{ asset($companie->image ?? 'img/logo.png') }}" alt="Logo" class="mobile-logo">
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">@lang('navbar.home')</a></li>
          <li><a href="{{ route('about') }}" class="{{ Route::is('about') ? 'active' : '' }}">@lang('navbar.about')</a></li>
          <li><a href="{{ route('gallery') }}" class="{{ Route::is('gallery') ? 'active' : '' }}">@lang('navbar.gallery')</a></li>
          <li><a href="">@lang('navbar.product')</a></li>
          <li><a href="">@lang('navbar.blog')</a></li>
          <li><a href="">@lang('navbar.contact')</a></li>
          <li class="dropdown">
            <a href="#"><span>@lang('navbar.language')</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('setlocale', ['lang' => 'id']) }}">Indonesia</a></li>
              <li><a href="{{ route('setlocale', ['lang' => 'en']) }}">English</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      @guest
        <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
      @endguest
    </div>
</header>