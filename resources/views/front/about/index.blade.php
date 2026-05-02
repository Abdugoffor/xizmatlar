@extends('layouts.front')
@section('title', getTranslation('About'))
@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2"
        style="background-image: url({{ asset(optional($aboutCompany)->banner_photo) }})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title mb-0">
                            <h2 class="page-title">{{ getTranslation('ABOUT US') }}</h2>
                            <ul class="page-list">
                                <li><a href="{{ route('home') }}">{{ getTranslation('Home') }}</a></li>
                                <li>{{ getTranslation('About Us') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- about area start -->
    <div class="about-area pd-top-120 pd-bottom-240">
        <div class="container">
            <div class="about-area-inner">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-thumb-wrap">
                            <img class="img-1" src="{{ asset('assets/img/about/shape.png') }}" alt="img" />
                            <img class="img-2" src="{{ asset($aboutCompany->photo_1) }}" alt="img" />
                            <img class="img-3" src="{{ asset($aboutCompany->photo_2) }}" alt="img" />
                            <div class="exprience-wrap">
                                <img src="{{ asset('assets/img/about/shape-3.png') }}" alt="img" />
                                <div class="details">
                                    <h1>{{ \Carbon\Carbon::parse($aboutCompany->experience_year)->age }}</h1>
                                    <p>{{ getLocale($aboutCompany->experience_text) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="about-inner-wrap">
                            <div class="section-title mb-0">
                                <h4 class="subtitle">{{ getTranslation('ABOUT US') }}</h4>
                                <h2 class="title">
                                    {{ getLocale($aboutCompany->title) }}
                                </h2>
                                <p class="content left-line">
                                    {{ getLocale($aboutCompany->description) }}
                                </p>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="list-inner-wrap mb-lg-0 mb-4">
                                            @php
                                                $items = explode(',', getLocale($aboutCompany->text));
                                            @endphp
                                            @foreach($items as $item)
                                                <li>
                                                    <img src="{{ asset('assets/img/icon/check.png') }}" alt="img" />
                                                    {{ trim($item) }}
                                                </li>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-xl-6 align-self-center">
                                        <div class="thumb">
                                            <img src="{{ asset($aboutCompany->photo_3) }}" alt="img" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->

    <!--fact-area start-->
    <div class="fact-area" style="background: #f9f9f9">
        <div class="container">
            <div class="fact-counter-area" style="background: url({{ asset('assets/img/fact/bg.png') }})">
                <div class="row justify-content-center">
                    @foreach ($aboutStatistics as $aboutStatistic)
                        <div class="col-lg-3 col-md-6">
                            <div class="single-fact-wrap {{ $loop->last ? 'after-none' : '' }}">
                                <h2>
                                    <span>{{ getLocale($aboutStatistic->title) }}</span>
                                </h2>
                                <h5>{{ getLocale($aboutStatistic->description) }}</h5>
                                <p>{{ getLocale($aboutStatistic->text) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--fact-area end-->

    <!--skill-area start-->
    <div class="skill-area pd-top-120 pd-bottom-120" style="background: #f9f9f9">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="thumb">
                                <img class="w-100" src="{{ asset($aboutPageSkills->photo_1) }}" alt="img" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="thumb img-2">
                                <img class="w-100" src="{{ asset($aboutPageSkills->photo_2) }}" alt="img" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="section-title mt-lg-0 mt-5">
                        <h4 class="subtitle style-2">{{ getLocale($aboutPageSkills->title) }}</h4>
                        <h2 class="title">{{ getLocale($aboutPageSkills->description) }}</h2>
                        <p>
                            {{ getLocale($aboutPageSkills->text) }}
                        </p>
                    </div>
                    <div class="skill-progress-area">
                        @foreach($skillsOptions as $index => $skill)
                            <div class="single-progressbar">
                                <div class="title" style="width: {{ $skill->progress }}%">
                                    <h6>{{ getLocale($skill->title) }}</h6>
                                    <div class="progress-count-wrap">
                                        <span class="progress-count counting" data-count="{{ $skill->progress }}">0</span>
                                        <span class="counting-icons">%</span>
                                    </div>
                                </div>
                                <div class="progress-item {{ $loop->last ? 'mb-0' : '' }}" id="progress-running-{{ $index }}">
                                    <div class="progress-bg">
                                        <div id="progress-{{ $index }}" class="progress-rate"
                                            data-value="{{ $skill->progress }}"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--skill-area end-->

    <!--video-area start-->
    {{-- <div class="video-area pd-top-120 pd-bottom-120" style="background: #080c24">
        <div class="video-thumb-wrap">
            <img src="{{ asset($aboutCompany->banner_photo) }}" alt="img" />
            <a class="video-play-btn" href="https://www.youtube.com/embed/Wimkqo8gDZ0" data-effect="mfp-zoom-in"><i
                    class="fa fa-play"></i></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="cta-inner-wrap" style="background: url({{ asset('assets/img/video/bg.png') }})">
                        <div class="section-title style-white mb-0">
                            <h4 class="subtitle style-2">{{ getTranslation("LET'S TALK") }}</h4>
                            <h2 class="title">{{ getTranslation("YOU NEED ANY HELP? GET FREE CONSULTATION") }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--video-area end-->

    <!--team-area start-->
    <div class="team-area pd-top-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h4 class="subtitle">{{ getTranslation("TEAM MEMBERS") }}</h4>
                        <h2 class="title">{{ getTranslation("OUR PROFESSIONAL TEAM") }}</h2>
                        <p>
                            {{ getTranslation("about_page_text_our_professional_team") }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="team-slider owl-carousel">
                        @foreach ($teams as $team)
                            <div class="item">
                                <div class="single-team-wrap">
                                    <div class="thumb">
                                        <img src="{{ asset($team->photo) }}" alt="img" />
                                    </div>
                                    <div class="details">
                                        <h5>{{ getLocale($team->name) }}</h5>
                                        <p>{{ getLocale($team->position) }}</p>
                                        <div class="hover-icon">
                                            <i class="fa fa-plus"></i>
                                            <ul class="social-area">
                                                <li><a href="{{ $team->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="{{ $team->telegram }}"><i class="fab fa-telegram"></i></a></li>
                                                <li><a href="{{ $team->watsapp }}"><i class="fab fa-whatsapp"></i></a></li>
                                                <li><a href="{{ $team->linked }}"><i class="fab fa-linkedin-in"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--team-area end-->

    <!-- testimonial area start -->
    <div class="testimonial-area style-2 pd-top-240 mrt-120 pd-bottom-120" style="background: #f9f9f9">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title mb-0">
                        <h4 class="subtitle style-2">{{ getTranslation("TESTIMONIALS") }}</h4>
                        <h2 class="title">{{ getTranslation("OUR CLIENT'S FEEDBACK") }}</h2>
                        <p class="content">
                            {{ getTranslation("about_page_text_our_clientas_feedback") }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider owl-carousel">
                @foreach ($comments as $comment)

                    <div class="item">
                        <div class="single-testimonial-wrap">
                            <div class="icon">
                                <img src="{{ asset('assets/img/testimonial/quote.png') }}" alt="img" />
                            </div>
                            <p>
                                {{ getLocale($comment->description) }}
                            </p>
                            <div class="client-wrap">
                                <div class="thumb">
                                    <img src="{{ asset($comment->photo) }}" alt="img" />
                                </div>
                                <div class="details">
                                    <h5>{{ getLocale($comment->title) }}</h5>
                                    <p>{{ $comment->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- testimonial area end -->

    <!--partner-area start-->
    <div class="partner-area pd-top-90 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center">
                        <h4 class="subtitle">{{ getTranslation("HAPPY CLIENTS") }}</h4>
                        <h2 class="title">{{ getTranslation("TRUSTED BY OUR 365,000 CLIENTS") }}</h2>
                        <p class="content">
                            {{ getTranslation("about_page_text_team") }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="partner-slider owl-carousel">
                @foreach ($clients as $client)
                    <div class="item">
                        @php
                            if (is_array($client->title)) {
                                $url = getLocale($client->title);
                            } else {
                                $url = $client->title;
                            }
                        @endphp

                        <a href="{{ $url }}" target="_blank">
                            <div class="thumb">
                                <img src="{{ asset($client->photo) }}" alt="img" />
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!--partner-area end-->
@endsection