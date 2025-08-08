@extends('layouts.app-pages')  

@section('title')
  {{ $product->name }}
@endsection

@push('meta-seo')
    
@endpush

@push('css')
    
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <section id="blog-details" class="blog-details section">
                    <div class="container">
    
                        <article class="article">
    
                            <div class="post-img">
                                <img src="{{ asset($product->image) }}" alt="" class="img-fluid">
                            </div>
    
                            <h2 class="title">
                                {{ $product->name }}
                            </h2>
    
                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                        href="#">{{ $product->categori->name }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="#"><time datetime="2022-01-01">{{ \Carbon\Carbon::parse($product->created_at)->format('d F Y') }}</time></a></li>
                                </ul>
                            </div><!-- End meta top -->
    
                            <div class="content">
                                {!! $locale == "id" ? $product->desc_id : $product->desc_en !!}
                            </div><!-- End post content -->
                        </article>
    
                    </div>
    
                    <section id="blog-comments" class="blog-comments section">
                        <div class="container">
                            <div id="comment-1" class="comment">
                                <div id="fb-root"></div>
                                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v23.0"></script>
                                <div class="fb-comments" 
                                    data-href="{{ url()->current() }}" 
                                    data-width="100%" 
                                    data-numposts="5">
                                </div>
    
                            </div>
                        </div>
                    </section>
                </section><!-- /Blog Details Section -->
            </div>
    
            <div class="col-lg-4 sidebar">
                <div class="widgets-container">
                    <!-- Search Widget -->
                    <div class="search-widget widget-item">

                        <h3 class="widget-title">@lang('blog.search')</h3>
                        <form>
                            <input type="text" name="search" value="{{ request('search') }}">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>
                    </div><!--/Search Widget -->

                    <div class="tags-widget widget-item">

                        <h3 class="widget-title">@lang('blog.categori')</h3>
                        <div class="accordion" id="accordionExample">
                            @foreach ($listCategori as $index => $ctg)
                                @php
                                    $headingId = 'heading' . $index;
                                    $collapseId = 'collapse' . $index;
                                @endphp

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="{{ $headingId }}">
                                        <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#{{ $collapseId }}" 
                                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                                                aria-controls="{{ $collapseId }}">
                                            <b>{{ $ctg->name }}</b>
                                        </button>
                                    </h2>
                                    <div id="{{ $collapseId }}" 
                                        class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" 
                                        aria-labelledby="{{ $headingId }}" 
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul>
                                                @foreach ($ctg->subCategori as $sbc)
                                                    <li>
                                                        <a href="{{ route('pages.product', ['categori' => $sbc->slug]) }}">
                                                            {{ $sbc->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    
@endpush