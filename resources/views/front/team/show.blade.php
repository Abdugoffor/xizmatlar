@extends('layouts.front')
@section('title', getTranslation('Service'))
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image: url({{ asset(optional($bunner)->team_photo) }})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title mb-0">
                            <h2 class="page-title">{{ getTranslation("SERVICES DETAILS") }}</h2>
                            <ul class="page-list">
                                <li><a href="{{ route('home') }}">{{ getTranslation("Home") }}</a></li>
                                <li><a href="{{ route('service') }}">{{ getTranslation("Service") }}</a></li>
                                <li>{{ getTranslation("Services Details") }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- service area start -->
    <div class="service-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="service-details-wrap">
                        <div class="thumb">
                            <img src="{{ asset($service->header_photo) }}" alt="img" />

                        </div>
                        {!! getLocale($service->content) !!}
                        @if($service->video_link)
                            <div class="video-thumb-wrap pt-1 pb-4">
                                <div class="video-responsive">
                                    <iframe src="{{ youtubeEmbed($service->video_link) }}" frameborder="0" allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        @endif
                        <p class="last-para">
                            {{ getLocale($service->footer_text) }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-area">

                        <div class="widget widget_catagory">
                            <h4 class="widget-title">
                                {{ getTranslation("SERVICE LIST") }}
                                <span class="dot"></span>
                            </h4>
                            <ul class="catagory-items">
                                @foreach ($servicesSections as $servicesSection)
                                    <li>
                                        <a href="{{ route('service.show', $servicesSection->slug) }}">{{ getLocale($servicesSection->title) }}
                                            <span><i class="fa fa-arrow-right"></i></span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget widget_download">
                            <h4 class="widget-title">
                                {{ getTranslation("DOWNLOAD BROCHURE") }}
                                <span class="dot"></span>
                            </h4>
                            <ul class="download-items">
                                @foreach ($sertificates as $sertificate)
                                    <li>
                                        <a href="{{ asset($sertificate->file) }}" target="_blank">
                                            <i class="far fa-file-pdf"></i> 
                                            {{ getLocale($sertificate->title) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service area end -->

@endsection