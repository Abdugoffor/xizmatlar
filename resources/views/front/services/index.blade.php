@extends('layouts.front')
@section('title', getTranslation('Service'))
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image: url({{ asset(optional($bunner)->service_photo) }})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title mb-0">
                            <h2 class="page-title">{{ getTranslation("SERVICES") }}</h2>
                            <ul class="page-list">
                                <li><a href="{{ route('home') }}">{{ getTranslation("Home") }}</a></li>
                                <li>{{ getTranslation("Services") }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- service area start -->
    <div class="service-area style-2 pd-top-115 pd-bottom-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center">
                        <h4 class="subtitle">{{ getTranslation("SERVICES") }}</h4>
                        <h2 class="title">{{ getTranslation("OUR SERVICE FOR YOU") }}</h2>
                        <p>
                            {{ getTranslation("Quickly optimize cooperative models for long-term high-impact rtROI. Dynamically drive innovative e-commerce and distributed paradigms") }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($services as $service)
                    <div class="col-lg-4">
                        <div class="single-service-wrap">
                            <div class="thumb">
                                <img src="{{ asset($service->cart_photo) }}" alt="img" />
                            </div>
                            <div class="details">
                                <h5>{{ getLocale($service->title) }}</h5>
                                <p>
                                    {{ getLocale($service->description) }}
                                </p>
                                <div class="btn-wrap">
                                    <a class="read-more-text" href="{{ route('service.show', $service->slug) }}">
                                        {{ getTranslation("READ MORE") }}
                                        <span><i class="fa fa-arrow-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $services->links() }}
        </div>
    </div>
    <!-- service area end -->

    <!--partner-area start-->
    <div class="partner-area pd-top-115 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center">
                        <h4 class="subtitle">{{ getTranslation("HAPPY CLIENTS") }}</h4>
                        <h2 class="title">{{ getTranslation("TRUSTED BY OUR 365,000 CLIENTS") }}</h2>
                        <p class="content">
                            {{ getTranslation("Dramatically enhance interactive metrics for reliable services. Proactively unleash fully researched e-commerce") }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="partner-slider owl-carousel">
                @foreach ($clients as $client)
                    <div class="item">
                        <div class="thumb">
                            <img src="{{ asset($client->photo) }}" alt="img" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--partner-area end-->
@endsection