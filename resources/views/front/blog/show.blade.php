@extends('layouts.front')
@section('title', getTranslation('Blog'))
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image: url({{ asset(optional($bunner)->blog_photo) }})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title mb-0">
                            <h2 class="page-title">{{ getTranslation("BLOG DETAILS") }}</h2>
                            <ul class="page-list">
                                <li><a href="{{ route('home') }}">{{ getTranslation("Home") }}</a></li>
                                <li><a href="{{ route('blog') }}">{{ getTranslation("Blog") }}</a></li>
                                <li>{{ getTranslation("Blog Details") }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- blog-details area start -->
    <div class="blog-details-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="single-blog-inner style-2">
                        <div class="thumb">
                            <img src="{{ asset($blog->photo) }}" alt="img" />
                        </div>
                        <div class="details">
                            <ul class="blog-meta">
                                <li>
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($blog->date)->format('d F, Y') }}
                                </li>
                            </ul>
                            <h2>
                                <a href="#">{{ getLocale($blog->title) }}</a>
                            </h2>
                            <p>
                                {{ getLocale($blog->description) }}
                            </p>
                            {!! getLocale($blog->content) !!}
                            @if($blog->video_link)
                                <div class="video-thumb-wrap pt-1 pb-4">
                                    <div class="video-responsive">
                                        <iframe src="{{ youtubeEmbed($blog->video_link) }}" frameborder="0" allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                            @endif
                            <p>
                                {{ getLocale($blog->footer_text) }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area">
                        <div class="widget widget-recent-post">
                            <h4 class="widget-title">
                                {{ getTranslation("RECENT POST") }}
                                <span class="dot"></span>
                            </h4>
                            <ul>
                                @foreach ($blogsSections as $blogsSection)
                                    <li>
                                        <div class="single-recent-post">
                                            <div class="thumb">
                                                <img src="{{ asset($blogsSection->photo) }}" alt="img" />
                                            </div>
                                            <div class="details">
                                                <h6>
                                                    <a href="#">{{ getLocale($blogsSection->title) }}</a>
                                                </h6>
                                                <p>
                                                    <i class="fa fa-calendar-alt"></i>
                                                    {{ \Carbon\Carbon::parse($blogsSection->date)->format('d F, Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-details area end -->
@endsection