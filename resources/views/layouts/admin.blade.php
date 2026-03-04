<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="/backend/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="/backend/assets/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="/backend/global_assets/js/main/jquery.min.js"></script>
    <script src="/backend/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="/backend/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="/backend/assets/js/app.js"></script>
    <script src="/backend/global_assets/js/demo_pages/form_select2.js"></script>
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
                       
                        <a href="{{ route('change.language', ['lang' => $language], false) }}"
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
                    <form action="/" method="post">
                        @csrf
                        <button class="dropdown-item"><i class="icon-switch2"></i> <span>Logout</span></button>
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
                <div class="sidebar-section">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">
                        <li class="nav-item">
                            <a href="/" class="nav-link"><i class="icon-home4"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('hotels.index', [], false) }}" class="nav-link">
                                <i class="icon-home4"></i><span>{{ getTranslation('Hotel') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('languages.index', [], false) }}" class="nav-link">
                                <i class="icon-home4"></i><span>{{ getTranslation('Language') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('translations.index', [], false) }}" class="nav-link">
                                <i class="icon-home4"></i><span>{{ getTranslation('Translation') }}</span>
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