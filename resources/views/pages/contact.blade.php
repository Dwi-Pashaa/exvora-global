@extends('layouts.app-pages')  

@section('title')
  {{ $locale === "id" ? "Kontak" : "Contact" }}
@endsection

@push('meta-seo')
    
@endpush

@push('css')
    
@endpush

@section('content')
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
            @if($companie && $companie->latitude && $companie->longitude)
                <iframe
                    width="100%"
                    height="200"
                    frameborder="0"
                    style="border:0"
                    src="https://www.google.com/maps?q={{ $companie->latitude }},{{ $companie->longitude }}&hl=es;z=14&output=embed"
                    allowfullscreen>
                </iframe>
            @else
                <p class="text-center">Belum mengisi koordinat lokasi.</p>
            @endif
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>@lang('contact.address')</h3>
                <p>{{ $companie->address }}</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>@lang('contact.call_us')</h3>
                <p>{{ $companie->telp }}</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>@lang('contact.email')</h3>
                <p>{{ $companie->email }}</p>
              </div>
            </div><!-- End Info Item -->

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
              data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">@lang('contact.btn')</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section>
@endsection

@push('js')
    
@endpush