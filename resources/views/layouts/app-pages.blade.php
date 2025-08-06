<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title') &mdash; {{ $companie->name ?? 'Perusahaan Testing' }}</title>

  @stack('meta-seo')
  <meta name="description" content="">
  <meta name="keywords" content="">
  <!-- Favicons -->
  <link href="{{ asset($companie->image ?? 'logo.png') }}" rel="icon">
  <link href="{{ asset($companie->image ?? 'logo.png') }}" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('pages') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('pages') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('pages') }}/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('pages') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('pages') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="{{ asset('pages') }}/css/main.css" rel="stylesheet">
  @stack('css')
  <style>
    .mobile-logo {
        display: none;
    }
    .desktop-logo {
        display: block;
    }

    @media (max-width: 767px) {
        .mobile-logo {
            display: block;
            height: 40px;
        }
        .desktop-logo {
            display: none;
        }
    }
  </style>
</head>

<body class="index-page">

  @include('components.navbar-pages')

  <main class="main">

    <section id="hero" class="hero section dark-background">
        @if (Route::is('home'))
            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                @foreach ($slider as $sldr)
                  <div class="carousel-item active">
                      <img src="{{ asset($sldr->image) }}" alt="">
                      <div class="carousel-container">
                          <h2>{{ $locale === "id" ? $sldr->title_id : $sldr->title_en }}<br></h2>
                          <p>
                            {!! $locale === "id" ? $sldr->desc_id : $sldr->desc_en !!}
                          </p>
                      </div>
                  </div>
                @endforeach
                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>
        
                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>
        
                <ol class="carousel-indicators"></ol>
            </div>
        @else
            <div class="page-title">
                <div class="container d-lg-flex justify-content-between align-items-center">
                    <h1 class="mb-2 mb-lg-0">@yield('title')</h1>
                    <nav class="breadcrumbs">
                      <ol>
                          <li><a href="{{ route('home') }}">Home</a></li>
                          <li class="current">@yield('title')</li>
                      </ol>
                    </nav>
                </div>
            </div>
        @endif
    </section>

    @yield('content')
  </main>

  <footer id="footer" class="footer dark-background">
 
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">{{ $companie->name ?? 'Perusahaan' }}</span>
          </a>
          <div class="footer-contact pt-3">
            <p>{{ $companie->address ?? 'Jl. Raya Ds Curukan' }}</p>
            <p class="mt-3"><strong>Phone:</strong> <span>{{ $companie->telp ?? '085730046642' }}</span></p>
            <p><strong>Email:</strong> <span>{{ $companie->email ?? 'dwipasha776@gmail.com' }}</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href="{{ $companie->twitter ?? '-' }}"><i class="bi bi-twitter-x"></i></a>
            <a href="{{ $companie->facebook ?? '-' }}"><i class="bi bi-facebook"></i></a>
            <a href="{{ $companie->instagram ?? '-' }}"><i class="bi bi-instagram"></i></a>
            <a href="{{ $companie->linkedin ?? '-' }}"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>@lang('footer.foot_link')</h4>
          <ul>
            <li><a href="{{ route('home') }}">@lang('navbar.home')</a></li>
            <li><a href="">@lang('navbar.about')</a></li>
            <li><a href="">@lang('navbar.gallery')</a></li>
            <li><a href="">@lang('navbar.product')</a></li>
            <li><a href="">@lang('navbar.blog')</a></li>
            <li><a href="">@lang('navbar.contact')</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>@lang('footer.foot_categori')</h4>
          <ul>
            @foreach ($categorie as $ct)
              <li><a href="#">{{ $ct->name }}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>@lang('footer.foot_news')</h4>
          <p>@lang('footer.foot_news_desc')!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">
          {{ $companie->name ?? 'Perusahaan' }}
      </strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by Dwi Pasha Anggara Putra
      </div>
    </div>

  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <script src="{{ asset('pages') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('pages') }}/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('pages') }}/vendor/aos/aos.js"></script>
  <script src="{{ asset('pages') }}/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('pages') }}/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="{{ asset('pages') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('pages') }}/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('pages') }}/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{ asset('pages') }}/vendor/swiper/swiper-bundle.min.js"></script>

  <script src="{{ asset('pages') }}/js/main.js"></script>

  @stack('js')
</body>

</html>