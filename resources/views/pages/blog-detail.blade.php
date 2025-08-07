@extends('layouts.app-pages')  

@section('title')
  {{ $blogs->title }}
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
                                <img src="{{ asset($blogs->image) }}" alt="" class="img-fluid">
                            </div>
    
                            <h2 class="title">
                                {{ $blogs->title }}
                            </h2>
    
                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="#">{{ $blogs->user->name }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="#"><time datetime="2022-01-01">{{ \Carbon\Carbon::parse($blogs->created_at)->format('d F Y') }}</time></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                        href="#">{{ $blogs->categori->name }}</a></li>
                                </ul>
                            </div><!-- End meta top -->
    
                            <div class="content">
                                {!! $locale == "id" ? $blogs->desc_id : $blogs->desc_en !!}
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
    
                    <h3 class="widget-title">Search</h3>
                    <form>
                    <input type="text" name="search" value="{{ request('search') }}">
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                    </form>
    
                </div><!--/Search Widget -->
    
                <div class="tags-widget widget-item">
    
                    <h3 class="widget-title">Categori</h3>
                    <ul>
                    @foreach ($listCategori as $ctg)
                        <li><a href="{{ route('blog', ['categori' => $ctg->slug]) }}">{{$ctg->name}}</a></li>
                    @endforeach
                    </ul>
    
                </div><!--/Tags Widget -->
    
                <!-- Recent Posts Widget -->
                <div class="recent-posts-widget widget-item">
    
                    <h3 class="widget-title">Recent Posts</h3>
    
                    @foreach ($recentBlogs as $rcn)
                    <div class="post-item">
                        <img src="{{ asset($rcn->image) }}" alt="" class="flex-shrink-0">
                        <div>
                            <h4><a href="{{ route('blog.detail', ['id' => $rcn->id]) }}">{{ $rcn->title }}</a></h4>
                            <time datetime="2020-01-01">{{ \Carbon\Carbon::parse($rcn->created_at)->format('d F Y')}}</time>
                        </div>
                    </div>
                    @endforeach
    
                </div><!--/Recent Posts Widget -->
                </div>
    
            </div>
        </div>
    </div>
@endsection

@push('js')
    
@endpush