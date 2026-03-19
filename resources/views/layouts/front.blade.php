<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" sizes="20x20" type="image/png" />

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
    <style>
        .video-responsive {
            position: relative;
            width: 100%;
            /* 🔥 col-8 ni to‘liq egallaydi */
            height: 0;
            padding-bottom: 56.25%;
            /* 16:9 ratio */
        }

        .video-responsive iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            /* 🔥 to‘liq kenglik */
            height: 100%;
            border: none;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 30px;
            padding-left: 0 !important;
            list-style: none;
        }

        /* item */
        .page-item {
            list-style: none;
        }

        /* link */
        .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 38px;
            height: 38px;
            padding: 0 12px;
            font-size: 14px;
            font-weight: 500;
            color: inherit;
            /* 🔥 rangni o‘zgartirmaydi */
            background: transparent;
            /* 🔥 oldingi background qoladi */
            border-radius: 6px;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        /* hover */
        .page-link:hover {
            transform: translateY(-2px);
            /* faqat animatsiya */
        }

        /* active */
        .page-item.active .page-link {
            font-weight: 600;
            transform: translateY(-2px);
        }

        /* disabled */
        .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* prev/next */
        .page-link[aria-label] {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <!-- navbar start -->
    <header class="navbar-area navbar-area-3 d-lg-none d-block">
        <nav class="navbar navbar-expand-lg px-4">
            <div class="container nav-container p-0 pt-2 pb-2">
                <a class="main-logo" href="{{ route('home') }}"><img src="/assets/img/home-3/2.png" alt="img" /></a>
                <div class="responsive-mobile-menu">
                    <button class="menu toggle-btn d-block d-lg-none" data-target="#logisk_main_menu"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="logisk_main_menu">
                    <ul class="navbar-nav menu-open text-lg-end">
                        <li>
                            <a href="{{ route('home') }}">{{ getTranslation('Home') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">{{ getTranslation('About') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('service') }}">{{ getTranslation('Service') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('blog') }}">{{ getTranslation('Blog') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">{{ getTranslation('Team') }}</a>
                        </li>

                        <li>
                            <a href="{{ route('contact') }}">{{ getTranslation('Contact Us') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- navbar end -->

    <!-- navbar start -->
    <header class="navbar-area navbar-area-3 d-lg-block d-none">
        <div class="row g-0">
            <div class="col-xl-2 col-lg-3">
                <div class="logo left-logo text-center align-self-center">
                    <a class="main-logo" href="{{ route('home') }}"><img src="/assets/img/home-3/2.png" alt="img" /></a>
                </div>
            </div>
            <div class="col-xl-10 col-lg-9">
                <div class="navbar-top mb-0 px-4 d-lg-block d-none">
                    <div class="container p-lg-0">
                        <div class="row">
                            <div class="col-lg-7 col-md-9 text-md-start text-center">
                                <ul class="topbar-left m-0">
                                    <li>
                                        <i class="fa fa-envelope"></i>
                                        {{ getTranslation("support@gmail.com") }}
                                    </li>
                                    <li>
                                        <i class="far fa-clock"></i>{{ getTranslation("Mon - Fri 09: AM - 05: PM") }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-5 col-md-3">
                                <ul class="topbar-right social-area text-md-end text-center">
                                    <li class="d-xl-inline-block d-none">
                                        <svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 0C7.0625 0 8.0625 0.28125 9 0.8125C9.90625 1.375 10.625 2.09375 11.1875 3C11.7188 3.9375 12 4.9375 12 6C12 6.625 11.9062 7.15625 11.7812 7.625C11.625 8.125 11.3438 8.71875 10.9375 9.4375C10.625 9.9375 10.0312 10.9375 9.125 12.375L7.28125 15.2812C7.09375 15.5938 6.8125 15.8125 6.5 15.9375C6.15625 16.0625 5.8125 16.0625 5.5 15.9375C5.15625 15.8125 4.90625 15.5938 4.71875 15.2812L2.875 12.375C1.9375 10.9375 1.34375 9.96875 1.0625 9.46875C0.625 8.71875 0.34375 8.125 0.21875 7.625C0.0625 7.15625 0 6.625 0 6C0 4.9375 0.25 3.9375 0.8125 3C1.34375 2.09375 2.0625 1.375 3 0.8125C3.90625 0.28125 4.90625 0 6 0ZM6 14.5L7.96875 11.375C8.78125 10.0625 9.34375 9.15625 9.625 8.71875C9.96875 8.09375 10.1875 7.625 10.3125 7.25C10.4375 6.90625 10.5 6.5 10.5 6C10.5 5.1875 10.2812 4.4375 9.875 3.75C9.46875 3.0625 8.9375 2.53125 8.25 2.125C7.5625 1.71875 6.8125 1.5 6 1.5C5.1875 1.5 4.4375 1.71875 3.75 2.125C3.0625 2.53125 2.5 3.0625 2.09375 3.75C1.6875 4.4375 1.5 5.1875 1.5 6C1.5 6.5 1.53125 6.90625 1.65625 7.28125C1.78125 7.65625 2.03125 8.125 2.40625 8.75C2.65625 9.1875 3.1875 10.0938 4.03125 11.4062C4.8125 12.6562 5.46875 13.6875 6 14.5ZM3.5 6C3.5 6.6875 3.71875 7.28125 4.21875 7.78125C4.71875 8.28125 5.3125 8.5 6 8.5C6.6875 8.5 7.25 8.28125 7.75 7.78125C8.25 7.28125 8.5 6.6875 8.5 6C8.5 5.3125 8.25 4.75 7.75 4.25C7.25 3.75 6.6875 3.5 6 3.5C5.3125 3.5 4.71875 3.75 4.21875 4.25C3.71875 4.75 3.5 5.3125 3.5 6Z"
                                                fill="#1869fe" />
                                        </svg>
                                        <span class="ms-1">{{ getTranslation("Richardson, California 62639") }}</span>
                                        <span class="ps-3">|</span>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg px-4">
                    <div class="container nav-container p-0 pt-2 pb-2">
                        <div class="responsive-mobile-menu">
                            <button class="menu toggle-btn d-block d-lg-none" data-target="#logisk_main_menu"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-left"></span>
                                <span class="icon-right"></span>
                            </button>
                        </div>
                        <div class="nav-right-part nav-right-part-mobile">
                            <a class="search-bar-btn" href="#">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.9062 14.6562C15.9688 14.7188 16 14.8125 16 14.9062C16 15.0312 15.9688 15.125 15.9062 15.1875L15.1875 15.875C15.0938 15.9688 15 16 14.9062 16C14.7812 16 14.7188 15.9688 14.6562 15.875L10.8438 12.0938C10.7812 12.0312 10.75 11.9375 10.75 11.8438V11.4062C10.1562 11.9062 9.5 12.3125 8.78125 12.5938C8.03125 12.875 7.28125 13 6.5 13C5.3125 13 4.21875 12.7188 3.21875 12.125C2.21875 11.5625 1.4375 10.7812 0.875 9.78125C0.28125 8.78125 0 7.6875 0 6.5C0 5.3125 0.28125 4.25 0.875 3.25C1.4375 2.25 2.21875 1.46875 3.21875 0.875C4.21875 0.3125 5.3125 0 6.5 0C7.6875 0 8.75 0.3125 9.75 0.875C10.75 1.46875 11.5312 2.25 12.125 3.25C12.6875 4.25 13 5.3125 13 6.5C13 7.3125 12.8438 8.0625 12.5625 8.78125C12.2812 9.53125 11.9062 10.1875 11.4062 10.75H11.8438C11.9375 10.75 12.0312 10.7812 12.0938 10.8438L15.9062 14.6562ZM6.5 11.5C7.375 11.5 8.21875 11.2812 9 10.8438C9.75 10.4062 10.375 9.78125 10.8125 9C11.25 8.25 11.5 7.40625 11.5 6.5C11.5 5.625 11.25 4.78125 10.8125 4C10.375 3.25 9.75 2.625 9 2.1875C8.21875 1.75 7.375 1.5 6.5 1.5C5.59375 1.5 4.75 1.75 4 2.1875C3.21875 2.625 2.59375 3.25 2.15625 4C1.71875 4.78125 1.5 5.625 1.5 6.5C1.5 7.40625 1.71875 8.25 2.15625 9C2.59375 9.78125 3.21875 10.4062 4 10.8438C4.75 11.2812 5.59375 11.5 6.5 11.5Z"
                                        fill="#080C24" />
                                </svg>
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="logisk_main_menu">
                            <ul class="navbar-nav menu-open">
                                <li>
                                    <a href="{{ route('home') }}">{{ getTranslation('Home') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}">{{ getTranslation('About') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('service') }}">{{ getTranslation('Service') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('blog') }}">{{ getTranslation('Blog') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('team') }}">{{ getTranslation('Team') }}</a>
                                </li>

                                <li>
                                    <a href="{{ route('contact') }}">{{ getTranslation('Contact Us') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="nav-right-part nav-right-part-desktop">

                            <div class="media d-xl-inline-flex d-none">
                                <div class="media-left me-2">
                                    <img src="/assets/img/p-icon.png" alt="img" />
                                </div>
                                <div class="media-body">
                                    <span class="title">{{ getTranslation("Emergency") }}</span> <br />
                                    <span class="phone-number text-white">{{ getTranslation("+56 (201) 555-0124") }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- navbar end -->

    @yield('content')
    <!-- footer area start -->
    <footer class="footer-area style-2">
        <div class="footer-top" style="background-image: url(assets/img/fact/bg.png)">

        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="widget widget_about pe-xl-5">
                        <h4 class="widget-title">
                            <img src="/assets/img/home-3/2.png" alt="img" />
                        </h4>
                        <div class="details">
                            <p>
                                {{ getTranslation("Quickly supply alternative strategic theme areas vis-a-vis B2C
                                mindshare. Objectively repurpose stand-alone synergy via
                                user-centric architectures") }}
                            </p>
                            <ul class="social-media style-bg-light">
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="widget widget_nav_menu">
                        <h4 class="widget-title">{{ getTranslation("Menyu") }}</h4>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">{{ getTranslation('Home') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}">{{ getTranslation('About') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('service') }}">{{ getTranslation('Service') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('blog') }}">{{ getTranslation('Blog') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('team') }}">{{ getTranslation('Team') }}</a>
                            </li>

                            <li>
                                <a href="{{ route('contact') }}">{{ getTranslation('Contact Us') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="widget widget_nav_menu">
                        <h4 class="widget-title">{{ getTranslation("Services") }}</h4>
                        <ul>
                            @foreach ($services as $service)
                                <li><a href="{{ route('service.show', $service->slug) }}">{{ getLocale($service->title) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- footer-bottom area start -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-lg-start text-center">
                    <div class="copyright-area">
                        <p>{{ getTranslation("© Copyright 2023 All right reserved") }}</p>
                    </div>
                </div>
                <div class="col-lg-6 text-lg-end text-center">
                    <ul>
                        <li>
                            <a href="#">{{ getTranslation("Terms & Condition") }}</a>
                        </li>
                        <li><a href="#">{{ getTranslation("Privacy & Policy") }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom area end -->

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->

    <!-- all plugins here -->
    <script src="{{ asset('assets/js/vendor.js') }}"></script>
    <!-- main js  -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        var leftArrow = "<img src='{{ asset('assets/img/icon/left-arrow.png') }}'>";
        var rightArrow = "<img src='{{ asset('assets/img/icon/right-arrow.png') }}'>";

        // banner-slider
        var $bannerSlider = $('.banner-slider');
        $bannerSlider.owlCarousel({
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            loop: true,
            autoplay: true,
            autoplayTimeout: 10000,
            nav: true,
            dots: false,
            items: 1,
            smartSpeed: 1800,
            navText: [leftArrow, rightArrow],
        });

        // team-slider
        var $teamSlider = $('.team-slider');
        $teamSlider.owlCarousel({
            margin: 30,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            items: 3,
            loop: true,
            autoplay: true,
            navText: [leftArrow, rightArrow],
            responsive: {
                769: { items: 3 },
                577: { items: 2 },
                0: { items: 1 }
            },
        });

        // testimonial-slider
        var $testimonialSlider = $('.testimonial-slider');
        $testimonialSlider.owlCarousel({
            margin: 30,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            items: 3,
            loop: true,
            autoplay: true,
            navText: [leftArrow, rightArrow],
            responsive: {
                769: { items: 3 },
                577: { items: 2 },
                0: { items: 1 }
            },
        });

        // feature-slider
        var $featureSlider = $('.feature-slider');
        $featureSlider.owlCarousel({
            margin: 30,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            items: 3,
            loop: true,
            autoplay: true,
            navText: [leftArrow, rightArrow],
            responsive: {
                769: { items: 3 },
                577: { items: 2 },
                0: { items: 1 }
            },
        });

        // service-slider
        var $serviceSlider = $('.service-slider');
        $serviceSlider.owlCarousel({
            margin: 30,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            items: 3,
            loop: true,
            autoplay: true,
            navText: [leftArrow, rightArrow],
            responsive: {
                769: { items: 3 },
                577: { items: 2 },
                0: { items: 1 }
            },
        });
    </script>
</body>

</html>