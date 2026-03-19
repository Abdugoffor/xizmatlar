@extends('layouts.front')
@section('title', getTranslation('Team'))
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image: url({{ asset($bunner->team_photo) }})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title mb-0">
                            <h2 class="page-title">{{ getTranslation("team_title") }}</h2>
                            <ul class="page-list">
                                <li><a href="{{ route('home') }}">{{ getTranslation("Home") }}</a></li>
                                <li>{{ getTranslation("Team") }}</li>
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
                        <h4 class="subtitle">{{ getTranslation("TEAM MEMBERS") }}</h4>
                        <h2 class="title">{{ getTranslation("OUR PROFESSIONAL TEAM") }}</h2>
                        <p>
                            {{ getTranslation("Dramatically enhance interactive metrics for reliable services. Proactively unleash fully researched e-commerce") }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($teams as $team)
                    <div class="col-lg-4 col-md-6 mb-4">
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
    <!-- service area end -->

@endsection