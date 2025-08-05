<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">
          {{ $companie->name ?? 'Perusahaan' }}
        </h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">@lang('navbar.home')</a></li>
          <li><a href="">@lang('navbar.about')</a></li>
          <li><a href="">@lang('navbar.gallery')</a></li>
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
      <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
    </div>
</header>