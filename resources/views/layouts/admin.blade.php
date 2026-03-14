<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet">

    <link rel="stylesheet" href="/backend/global_assets/css/icons/icomoon/styles.min.css">
    <link rel="stylesheet" href="/backend/assets/css/all.min.css">

    <!-- SUMMERNOTE CSS -->
    <link rel="stylesheet" href="/backend/global_assets/js/plugins/editors/summernote/summernote.min.css">

    <script src="/backend/global_assets/js/main/jquery.min.js"></script>
    <script src="/backend/global_assets/js/main/bootstrap.bundle.min.js"></script>

    <script src="/backend/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>

    <script src="/backend/assets/js/app.js"></script>
    <script src="/backend/global_assets/js/demo_pages/editor_summernote.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.css" rel="stylesheet">

</head>

<body>
    <div class="navbar navbar-expand-lg navbar-dark navbar-static">
        <div class="navbar-brand text-center text-lg-left">
            <a href="/" class="d-inline-block d-flex align-items-center">
                <img src="/backend/admin_logo.webp" class="d-none d-sm-block" alt=""
                    style="height:35px;margin-right:10px;">

                <span style="color: white; font-size: 14px;">{{ getTranslation('Admin Panel') }}</span>
            </a>
        </div>
        <div class="collapse navbar-collapse order-2 order-lg-1" id="navbar-mobile">

        </div>
        <ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">
            <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
                <a href="#"
                    class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100"
                    data-toggle="dropdown">
                    <span class="d-none d-lg-inline-block"
                        style="text-transform: capitalize; !important">{{ app()->getLocale() }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    @foreach (getLanguage()->pluck('name')->toArray() as $language)
                        <a href="{{ route('change.language', ['lang' => $language]) }}"
                            class="dropdown-item {{ app()->getLocale() == $language ? 'active' : '' }}">
                            {{ $language }}
                        </a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
                <a href="#"
                    class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100"
                    data-toggle="dropdown">
                    <span class="d-none d-lg-inline-block">{{ auth()->user()->role ?? 'User' }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item">
                            <i class="icon-switch2"></i> <span>Logout</span>
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <div class="page-content">
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">
            <div class="sidebar-content">
                <div class="sidebar-section sidebar-user my-1">
                    <div class="sidebar-section-body">
                        <div class="media">
                            <div class="media-body">
                                <div class="font-weight-semibold">{{ auth()->user()->name ?? 'Guest' }}</div>
                                <div class="font-size-sm line-height-sm opacity-50">{{ auth()->user()->email ?? '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $group1 = request()->routeIs('carousels.*') ||
                        request()->routeIs('aboutcompanies.*') ||

                        request()->routeIs('processsections.*') ||
                        request()->routeIs('servicesections.*') ||
                        request()->routeIs('portfolios.*') ||
                        request()->routeIs('comments.*') ||
                        request()->routeIs('statistics.*');

                    $group2 = request()->routeIs('aboutpageheaders.*') ||
                        request()->routeIs('aboutstatistics.*') ||
                        request()->routeIs('aboutpageskills.*') ||
                        request()->routeIs('skillsoptions.*') ||
                        request()->routeIs('teams.*') ||
                        request()->routeIs('clients.*') ||
                        request()->routeIs('aboutcompanies.*');

                    $group3 = request()->routeIs('services.*') ||
                        request()->routeIs('contacts.*') ||
                        request()->routeIs('sertificates.*') ||
                        request()->routeIs('languages.*') ||
                        request()->routeIs('translations.*') ||
                        request()->routeIs('blogs.*');

                @endphp

                <div class="sidebar-section">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">
                        {{-- GROUP 1 --}}
                        <li class="nav-item nav-item-submenu {{ $group1 ? 'nav-item-expanded nav-item-open' : '' }}">
                            <a href="#" class="nav-link {{ $group1 ? 'active' : '' }}">
                                <i class="icon-stack2"></i>
                                <span>{{ getTranslation('Home Page') }}</span>
                            </a>

                            <ul class="nav nav-group-sub {{ $group1 ? 'd-block' : '' }}">

                                <li class="nav-item">
                                    <a href="{{ route('carousels.index') }}"
                                        class="nav-link {{ request()->routeIs('carousels.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('Carousel') }}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('aboutcompanies.index') }}"
                                        class="nav-link {{ request()->routeIs('aboutcompanies.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('About Company') }}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('servicesections.index') }}"
                                        class="nav-link {{ request()->routeIs('servicesections.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('ServiceSection') }}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('processsections.index') }}"
                                        class="nav-link {{ request()->routeIs('processsections.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('ProcessSection') }}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('portfolios.index') }}"
                                        class="nav-link {{ request()->routeIs('portfolios.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('Portfolio') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('comments.index') }}"
                                        class="nav-link {{ request()->routeIs('comments.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('Comment') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistics.index') }}"
                                        class="nav-link {{ request()->routeIs('statistics.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('Statistic') }}</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        {{-- GROUP 2 --}}
                        <li class="nav-item nav-item-submenu {{ $group2 ? 'nav-item-expanded nav-item-open' : '' }}">
                            <a href="#" class="nav-link {{ $group2 ? 'active' : '' }}">
                                <i class="icon-stack2"></i>
                                <span>{{ getTranslation('About Page') }}</span>
                            </a>

                            <ul class="nav nav-group-sub {{ $group2 ? 'd-block' : '' }}">

                                <li class="nav-item">
                                    <a href="{{ route('aboutpageheaders.index') }}"
                                        class="nav-link {{ request()->routeIs('aboutpageheaders.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('About Page Header') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('aboutstatistics.index') }}"
                                        class="nav-link {{ request()->routeIs('aboutstatistics.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('About Statistic') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('aboutpageskills.index') }}"
                                        class="nav-link {{ request()->routeIs('aboutpageskills.*') || request()->routeIs('skillsoptions.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('About Page Skill') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('teams.index') }}"
                                        class="nav-link {{ request()->routeIs('teams.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('Team') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('clients.index') }}"
                                        class="nav-link {{ request()->routeIs('clients.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('Client') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- GROUP 3 --}}
                        <li class="nav-item nav-item-submenu {{ $group3 ? 'nav-item-expanded nav-item-open' : '' }}">
                            <a href="#" class="nav-link {{ $group3 ? 'active' : '' }}">
                                <i class="icon-stack2"></i>
                                <span>{{ getTranslation('Content') }}</span>
                            </a>
                            <ul class="nav nav-group-sub {{ $group3 ? 'd-block' : '' }}">

                                <li class="nav-item">
                                    <a href="{{ route('services.index') }}"
                                        class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('Service') }}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('blogs.index') }}"
                                        class="nav-link {{ request()->routeIs('blogs.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('Blog') }}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('contacts.index') }}"
                                        class="nav-link {{ request()->routeIs('contacts.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('Contact') }}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('sertificates.index') }}"
                                        class="nav-link {{ request()->routeIs('sertificates.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('Sertificate') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('languages.index') }}"
                                        class="nav-link {{ request()->routeIs('languages.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('Language') }}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('translations.index') }}"
                                        class="nav-link {{ request()->routeIs('translations.*') ? 'active' : '' }}">
                                        <i class="icon-list-unordered"></i>
                                        <span>{{ getTranslation('Translation') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                                class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                <i class="icon-users"></i>
                                <span>{{ getTranslation('Users') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="content-inner">
                <div class="page-header page-header-light">
                    <div class="page-header-content header-elements-lg-inline">
                        <div class="page-title d-flex">
                            <h4><span class="font-weight-semibold">@yield('title')</span></h4>
                        </div>
                    </div>
                </div>
                @yield('content')
                <div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item">
                                <a href="https://uzinfocom.uz" target="_blank"
                                    class="navbar-nav-link font-weight-semibold">
                                    <span class="text-pink">uzinfocom</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>