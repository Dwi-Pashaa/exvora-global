<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, viewport-fit=cover"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      Login &mdash; {{ $companie->name ?? 'Perusahaan Testing' }}
    </title>
    <!-- CSS files -->
    <link href="{{ asset('admin') }}/css/tabler.min.css?1738096682" rel="stylesheet" />
    <link href="{{ asset('admin') }}/css/tabler-flags.min.css?1738096682" rel="stylesheet" />
    <link
      href="{{ asset('admin') }}/css/tabler-socials.min.css?1738096682"
      rel="stylesheet"
    />
    <link
      href="{{ asset('admin') }}/css/tabler-payments.min.css?1738096682"
      rel="stylesheet"
    />
    <link
      href="{{ asset('admin') }}/css/tabler-vendors.min.css?1738096682"
      rel="stylesheet"
    />
    <link
      href="{{ asset('admin') }}/css/tabler-marketing.min.css?1738096682"
      rel="stylesheet"
    />
    <link href="{{ asset('admin') }}/css/demo.min.css?1738096682" rel="stylesheet" />
    <style>
      @import url("https://rsms.me/inter/inter.css");
      .page {
        display: grid;
        place-items: center; /* Cara cepat untuk memusatkan elemen */
        min-height: 100vh;
      }
    </style>
  </head>
  <body class="d-flex flex-column">
    <script src="{{ asset('admin') }}/js/demo-theme.min.js?1738096682"></script>
    <div class="page">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <img src="{{ asset($companie->image ?? 'logo.png') }}" width="100" alt="">
        </div>
        <div class="card card-md">
          <div class="card-body">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('admin') }}/js/tabler.min.js?1738096682" defer></script>
    <script src="{{ asset('admin') }}/js/demo.min.js?1738096682" defer></script>
  </body>
</html>
