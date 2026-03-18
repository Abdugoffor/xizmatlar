@extends('layouts.front')
@section('title', getTranslation('Contact'))
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-area bg-overlay-2" style="background-image: url('assets/img/banner/breadcrumb.png')">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-inner">
                        <div class="section-title mb-0">
                            <h2 class="page-title">{{ getTranslation("CONTACT US") }}</h2>
                            <ul class="page-list">
                                <li><a href="{{ route('home') }}">{{ getTranslation("Home") }}</a></li>
                                <li>{{ getTranslation("Contact Us") }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- contact area start -->
    <div class="container">
        <div class="contact-area mg-top-120 mb-120">
            <div class="row g-0 justify-content-center">
                <div class="col-lg-7">
                    <form class="contact-form text-center">
                        <h3>{{ getTranslation("GET A QUOTE") }}</h3>
                        <div class="row">
                            <div class="col-12">
                                <div class="single-input-inner">
                                    <label><i class="fa fa-user"></i></label>
                                    <input type="text" name="name" placeholder="{{ getTranslation("Your name") }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <label><i class="fa fa-envelope"></i></label>
                                    <input type="text" name="email" placeholder="{{ getTranslation("Your email") }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-inner">
                                    <label><i class="fas fa-calculator"></i></label>
                                    <input type="text" name="phone" placeholder="{{ getTranslation("Phone number") }}" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-input-inner">
                                    <label><i class="fas fa-pencil-alt"></i></label>
                                    <textarea name="text" placeholder="Write massage"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <a class="btn btn-base" href="#"> {{ getTranslation("SEND MESSAGE") }} </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="contact-information-wrap">
                        <h3>{{ getTranslation("CONTACT INFORMATION") }}</h3>
                        <div class="single-contact-info-wrap">
                            <h6>{{ getTranslation("Contact Number:") }}</h6>
                            <div class="media">
                                <div class="icon">
                                    <i class="fa fa-phone-alt"></i>
                                </div>
                                <div class="media-body">
                                    <p>{{ $contact->phone_1 }}</p>
                                    <p>{{ $contact->phone_2 }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="single-contact-info-wrap">
                            <h6>{{ getTranslation("Mail Address:") }}</h6>
                            <div class="media">
                                <div class="icon" style="background: #080c24">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="media-body">
                                    <p>{{ $contact->email_1 }}</p>
                                    <p>{{ $contact->email_2 }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="single-contact-info-wrap mb-0">
                            <h6>{{ getTranslation("Office Location:") }}</h6>
                            <div class="media">
                                <div class="icon" style="background: #565969">
                                    <i class="fa fa-map-marker-alt"></i>
                                </div>
                                <div class="media-body">
                                    <p>{{ getLocale($contact->address) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->

    <div class="contact-g-map">
        <div id="map" style="width: 100%; height: 550px;"></div>
    </div>
    <script src="https://api-maps.yandex.ru/2.1/?lang=en_US"></script>

    <script>
        ymaps.ready(init);

        let locationName = "{{ getLocale($contact->address) }}";
        let locationMap = "{{ $contact->location }}";

        function init() {

            let coords = locationMap.split(',').map(Number);

            var map = new ymaps.Map("map", {
                center: coords,
                zoom: 12
            });

            var locations = [
                { coords: coords, title: locationName },
                // { coords: [39.6542, 66.9597], title: "Samarkand" },
                // { coords: [40.7831, 72.3442], title: "Andijan" },
                // { coords: [40.9983, 71.6726], title: "Namangan" }
            ];

            locations.forEach(function (loc) {
                var placemark = new ymaps.Placemark(
                    loc.coords,
                    { balloonContent: loc.title },
                    { preset: 'islands#redIcon' }
                );

                map.geoObjects.add(placemark);
            });
        }
    </script>
@endsection