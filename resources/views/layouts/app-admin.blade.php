<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      @yield('title')
    </title>
    @stack('meta-seo')
    <!-- CSS files -->
    <link href="{{ asset('admin') }}/css/tabler.min.css?1738096684" rel="stylesheet" />
    <link href="{{ asset('admin') }}/css/tabler-flags.min.css?1738096684" rel="stylesheet" />
    <link
      href="{{ asset('admin') }}/css/tabler-socials.min.css?1738096684"
      rel="stylesheet"
    />
    <link
      href="{{ asset('admin') }}/css/tabler-payments.min.css?1738096684"
      rel="stylesheet"
    />
    <link
      href="{{ asset('admin') }}/css/tabler-vendors.min.css?1738096684"
      rel="stylesheet"
    />
    <link
      href="{{ asset('admin') }}/css/tabler-marketing.min.css?1738096684"
      rel="stylesheet"
    />
    <link href="{{ asset('admin') }}/css/demo.min.css?1738096684" rel="stylesheet" />
    <style>
      @import url("https://rsms.me/inter/inter.css");
    </style>
    @stack('css')
  </head>

  <body>
    <script src="{{ asset('admin') }}/js/demo-theme.min.js?1738096684"></script>
    <div class="page">
      <!-- Navbar -->
      @include('components.topbar-admin')
      @include('components.navbar-admin')
      <div class="page-wrapper">
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl my-auto">
            @yield('content')
          </div>
        </div>
        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2025
                    <a href="." class="link-secondary">
                      {{ $companie->name ?? 'Perusahaan Testing' }}
                    </a>. All rights
                    reserved.
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('admin') }}/js/tabler.min.js?1738096684" defer></script>
    <script src="{{ asset('admin') }}/js/demo.min.js?1738096684" defer></script>
    @stack('js')
  </body>
</html>
