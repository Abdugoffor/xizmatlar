@extends('layouts.front')
@section('title', getTranslation('Home title'))
@section('content')

    <!-- banner start -->
    <div class="position-relative">
        <div class="slider slider-for banner-slider-main">
            @foreach ($carousels as $carousel)
                <div class="item" style="background: url({{ asset($carousel->photo) }})">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner-inner style-white">
                                    <h6 class="sub-title text-base mb-3">
                                        <svg class="me-2" width="40" height="12" viewBox="0 0 40 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="20" width="20" height="2" fill="#1869FE" />
                                            <rect y="10" width="40" height="2" fill="#1869FE" />
                                        </svg>
                                        {{ getLocale($carousel->title) }}
                                    </h6>
                                    <h1 class="b-animate-2 title">
                                        {{ getLocale($carousel->description) }}
                                    </h1>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="container position-relative">
            <div class="slider slider-nav banner-slider-main-nav">
                @foreach ($carousels as $carousel)
                    <div class="item">
                        <img src="{{ asset($carousel->photo) }}" alt="{{ getLocale($carousel->title) }}" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- about area start -->
    <div class="about-area-2 half-bg-right pd-top-120 pd-bottom-120" style="background: url(assets/img/home-3/13.png)">
        <div class="container">
            <div class="about-area-inner">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="about-thumb-wrap mb-lg-0 mb-4">
                            <img class="hover-bg" src="{{ $aboutCompany->main_photo }}" alt="img" />
                        </div>
                    </div>
                    <div class="col-lg-7 align-self-center">
                        <div class="about-inner-wrap ms-0 ps-lg-4 mt-0">
                            <div class="section-title mb-0">
                                <h6 class="sub-title text-base mb-3">
                                    <svg class="me-2" width="40" height="12" viewBox="0 0 40 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="20" width="20" height="2" fill="#1869FE" />
                                        <rect y="10" width="40" height="2" fill="#1869FE" />
                                    </svg>
                                    {{ getLocale($aboutCompany->section_label) }}
                                </h6>
                                <h2 class="title mb-2">
                                    {{ getLocale($aboutCompany->title) }}
                                </h2>
                                <p class="mb-4">
                                    {{ getLocale($aboutCompany->description) }}
                                </p>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="media border-bottom-1 pb-3 mb-3">
                                            <div class="media-left me-3">
                                                <img src="{{ $aboutCompany->block_photo1 }}" alt="img" />
                                            </div>
                                            <div class="media-body">
                                                <h5>{{ getLocale($aboutCompany->block_label1) }}</h5>
                                                <p class="mb-0">
                                                    {{ getLocale($aboutCompany->block_title1) }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left me-3">
                                                <img src="{{ $aboutCompany->block_photo2 }}" alt="img" />
                                            </div>
                                            <div class="media-body">
                                                <h5>{{ getLocale($aboutCompany->block_label2) }}</h5>
                                                <p class="mb-0">
                                                    {{ getLocale($aboutCompany->block_title2) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-wrap border-top-0">
                                    <a class="btn btn-base mb-md-0 mb-4"
                                        href="{{ route('about') }}">{{ getTranslation('Load More') }} <i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->

    <!-- service area start -->
    <div class="service-area pd-top-115 pd-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h6 class="sub-title text-base mb-3">
                            <svg class="me-2" width="40" height="12" viewBox="0 0 40 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="20" width="20" height="2" fill="#1869FE" />
                                <rect y="10" width="40" height="2" fill="#1869FE" />
                            </svg>
                            {{ getTranslation('About Company') }}
                        </h6>
                        <h2 class="title">{{ getTranslation('Popular Logistics Services') }}</h2>
                    </div>
                </div>
                <div class="col-lg-6 text-lg-end align-self-center">
                    <div class="btn-wrap mb-5 mb-lg-0">
                        <a class="btn btn-base" href="{{ route('service') }}">{{ getTranslation('All Services') }} <i
                                class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-3">
                        <div class="single-service-wrap-2 style-2" style="background-image: url(assets/img/home-3/18.png)">
                            <div class="thumb">
                                <div class="icon">
                                    <img src="{{ $service->cart_photo }}" alt="img" />
                                </div>
                            </div>
                            <div class="details">
                                <h5>{{ getLocale($service->title) }}</h5>
                                <p>{{ getLocale($service->description) }}</p>
                                <div class="btn-wrap">
                                    <a class="read-more-text"
                                        href="{{ route('service.show', $service->slug) }}">{{ getTranslation('READ MORE') }}<i
                                            class="ms-3 fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- service area end -->

    <!-- about area start -->
    <div class="about-area-2 bg-black pd-top-120 mb-5">
        <div class="container">
            <div class="about-area-inner">
                <div class="row">
                    <div class="col-lg-5 order-lg-2">
                        <div class="about-thumb-wrap mb-lg-0 mb-5">
                            <img class="hover-bg margin-bottom--150" src="{{ $serviceSections->main_photo }}"
                                alt="img" />
                        </div>
                    </div>
                    <div class="col-lg-7 order-lg-1 align-self-center">
                        <div class="about-inner-wrap ms-0 ps-lg-4 pb-5 mb-4">
                            <div class="section-title style-white mb-0">
                                <h6 class="sub-title text-base mb-3">
                                    <svg class="me-2" width="40" height="12" viewBox="0 0 40 12"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="20" width="20" height="2" fill="#1869FE" />
                                        <rect y="10" width="40" height="2" fill="#1869FE" />
                                    </svg>
                                    {{ getLocale($serviceSections->title) }}
                                </h6>
                                <h2 class="title mb-4 pb-2">
                                    {{ getLocale($serviceSections->description) }}
                                </h2>
                                <div class="media border-bottom-1-dark pb-3 mb-3">
                                    <div class="media-left me-3">
                                        <img src="{{ $serviceSections->photo_1 }}" alt="img" />
                                    </div>
                                    <div class="media-body">
                                        <h6 class="text-white">{{ getLocale($serviceSections->label_1) }}</h6>
                                        <p class="mb-0 text-white">
                                            {{ getLocale($serviceSections->text_1) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="media border-bottom-1-dark pb-3 mb-3">
                                    <div class="media-left me-3">
                                        <img src="{{ $serviceSections->photo_2 }}" alt="img" />
                                    </div>
                                    <div class="media-body">
                                        <h6 class="text-white">{{ getLocale($serviceSections->label_2) }}</h6>
                                        <p class="mb-0 text-white">
                                            {{ getLocale($serviceSections->text_2) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left me-3">
                                        <img src="{{ $serviceSections->photo_3 }}" alt="img" />
                                    </div>
                                    <div class="media-body">
                                        <h6 class="text-white">{{ getLocale($serviceSections->label_3) }}</h6>
                                        <p class="mb-0 text-white">
                                            {{ getLocale($serviceSections->text_3) }}
                                        </p>
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

    <!-- work-process area start -->
    <div class="work-process-area pd-top-120 pd-bottom-120 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h6 class="sub-title text-base mb-3">
                            <svg class="me-2" width="40" height="12" viewBox="0 0 40 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="20" width="20" height="2" fill="#1869FE" />
                                <rect y="10" width="40" height="2" fill="#1869FE" />
                            </svg>
                            {{ getTranslation('Working Process') }}
                            <svg class="ms-2" width="40" height="12" viewBox="0 0 40 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="20" height="2" transform="matrix(-1 0 0 1 20 0)" fill="#1869FE" />
                                <rect width="40" height="2" transform="matrix(-1 0 0 1 40 10)" fill="#1869FE" />
                            </svg>
                        </h6>
                        <h2 class="title">{{ getTranslation('Working Process for services') }}</h2>
                    </div>
                </div>
            </div>

            {{-- <div class="bg work-process-bg bg-cover" style="background-image: url(assets/img/home-3/26.png)"> --}}
            <div class="bg work-process-bg bg-cover">
                <div class="row justify-content-center">
                    @foreach ($progresSections as $progres)
                            <div class="col-lg-3 col-md-6">
                                <div class="single-work-process-inner text-center mx-auto">
                                    <div class="thumb">
                                        <div class="icon">
                                            <img src="{{ $progres->photo }}" alt="img" />
                                        </div>
                                    </div>
                                    <div class="details">
                                        <h6>{{ getLocale($progres->title) }}</h6>
                                        <p>{{ getLocale($progres->description) }}</p>
                                        <div class="count">{{ $progres->order }}</div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- work-process area end -->

    <!-- project area start -->
    <div class="project-area pd-top-115 pd-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h6 class="sub-title text-base mb-3">
                            <svg class="me-2" width="40" height="12" viewBox="0 0 40 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="20" width="20" height="2" fill="#1869FE" />
                                <rect y="10" width="40" height="2" fill="#1869FE" />
                            </svg>
                            {{ getTranslation('Our Portfolio') }}
                        </h6>
                        <h2 class="title">{{ getTranslation('Explore Our Recent Work') }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-slider owl-carousel">
            @foreach ($portfolios as $portfolio)
                <div class="single-project-inner" style="background-image: url({{ $portfolio->photo }})">
                    <div class="details">
                        <span class="cat">{{ getLocale($portfolio->title) }}</span>
                        <h5>{{ getLocale($portfolio->description) }}</h5>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- project area end -->

    <!-- testimonial area start -->
    <div class="testimonial-area pd-bottom-120 mb-120">
        <div class="container">
            <div class="section-title text-center">
                <h6 class="sub-title text-base mb-3">
                    <svg class="me-2" width="40" height="12" viewBox="0 0 40 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="20" width="20" height="2" fill="#1869FE" />
                        <rect y="10" width="40" height="2" fill="#1869FE" />
                    </svg>
                    {{ getTranslation('Testimonial') }}
                    <svg class="ms-2" width="40" height="12" viewBox="0 0 40 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="20" height="2" transform="matrix(-1 0 0 1 20 0)" fill="#1869FE" />
                        <rect width="40" height="2" transform="matrix(-1 0 0 1 40 10)" fill="#1869FE" />
                    </svg>
                </h6>
                <h2 class="title">{{ getTranslation('What Our clients say About Us') }}</h2>
            </div>
            <div class="row">
                @foreach ($comments as $comment)
                    <div class="col-lg-4">
                        <div class="single-testimonial-wrap style-2">
                            <div class="client-wrap">
                                <div class="thumb">
                                    <img src="{{ $comment->photo }}" alt="img" />
                                </div>
                                <div class="details">
                                    <h5>{{ getLocale($comment->title) }}</h5>
                                    <p>{{ $comment->name }}</p>
                                </div>
                            </div>
                            <p>
                                {{ getLocale($comment->description) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- testimonial area end -->

    <div class="contact-area" style="background-image: url(assets/img/home-3/40.png)">
        <!--fact-area start-->
        <div class="container">
            <div class="fact-counter-area style-2 bg-black">
                <div class="row justify-content-center">
                    @foreach ($statistics as $statistic)
                        <div class="col-lg-3 col-md-6">
                            <div class="single-fact-wrap text-center">
                                <div class="thumb mb-3">
                                    <img src="{{ $statistic->photo }}" alt="img" />
                                </div>
                                <h2 class="mb-0 text-white">
                                    <span class="counter">{{ getLocale($statistic->title) }}</span>+
                                </h2>
                                <p>{{ getLocale($statistic->description) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="contact-wrap pd-top-100">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title pe-lg-5 me-lg-5">
                            <h6 class="sub-title text-base mb-3">
                                <svg class="me-2" width="40" height="12" viewBox="0 0 40 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="20" width="20" height="2" fill="#1869FE" />
                                    <rect y="10" width="40" height="2" fill="#1869FE" />
                                </svg>
                                {{ getTranslation('Booking Appointment') }}
                            </h6>
                            <h2 class="title mb-4">{{ getTranslation('Book online skip the line Save time!') }}</h2>
                            <p>
                                {{ getTranslation('Proin aliquam velit sed elit luctus, a luctus augue pellentesque. Mauris gravida dui ut tincidunt blandit. Nulla pretium') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 ps-xl-5">
                        <form action="" method="post">

                            <div class="quote-wrap ms-xl-5" style="background: var(--main-color)">
                                <h4 class="mb-4">{{ getTranslation('Request a Quote') }}</h4>
                                <div class="single-input-inner style-bg border-radius-5">
                                    <label><i class="fa fa-user"></i></label>
                                    <input type="text" name="name"
                                        placeholder="{{ getTranslation('Your name') }}" />
                                </div>
                                <div class="single-input-inner style-bg border-radius-5">
                                    <label><i class="fa fa-envelope"></i></label>
                                    <input type="text" name="email"
                                        placeholder="{{ getTranslation('Your email') }}" />
                                </div>
                                <div class="single-input-inner style-bg border-radius-5">
                                    <label><i class="fas fa-calculator"></i></label>
                                    <input type="text" name="phone"
                                        placeholder="{{ getTranslation('Phone number') }}" />
                                </div>
                                <div class="single-input-inner style-bg border-radius-5">
                                    <label><i class="fas fa-pencil-alt"></i></label>
                                    <textarea name="text" placeholder="Write massage"></textarea>
                                </div>
                                <button class="btn btn-dark" type="submit">{{ getTranslation('Request a Quote') }} <i
                                        class="fa fa-arrow-right"></i></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--fact-area end-->
    </div>

    <!--blog-area start-->
    <div class="blog-area pd-top-115 pd-bottom-90">
        <div class="container p-sm-0">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h6 class="sub-title text-base mb-3">
                            <svg class="me-2" width="40" height="12" viewBox="0 0 40 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="20" width="20" height="2" fill="#1869FE" />
                                <rect y="10" width="40" height="2" fill="#1869FE" />
                            </svg>
                            {{ getTranslation('LATEST BLOG') }}
                            <svg class="ms-2" width="40" height="12" viewBox="0 0 40 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="20" height="2" transform="matrix(-1 0 0 1 20 0)" fill="#1869FE" />
                                <rect width="40" height="2" transform="matrix(-1 0 0 1 40 10)" fill="#1869FE" />
                            </svg>
                        </h6>
                        <h2 class="title">{{ getTranslation('LATEST NEWS & ARTICLES') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-inner style-2">
                            <div class="thumb">
                                <img src="{{ $blog->photo }}" alt="img" />
                            </div>
                            <div class="details">
                                <ul class="blog-meta border-0 m-0 pb-2">
                                    <li><i class="fas fa-calendar-alt"></i>{{ $blog->date->format('d M Y') }}</li>
                                </ul>
                                <h5>
                                    <a href="{{ route('blog.show', $blog->slug) }}">{{ getLocale($blog->title) }}</a>
                                </h5>
                                <p>
                                    {{ getLocale($blog->description) }}
                                </p>
                                <a class="read-more-text"
                                    href="{{ route('blog.show', $blog->slug) }}">{{ getTranslation('READ MORE') }} <i
                                        class="fa fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--blog-area end-->
@endsection
