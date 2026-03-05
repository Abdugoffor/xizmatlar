<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">

    <!--localuchun uchun -->
    <link href="/backend/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="/backend/assets/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->


    <script src="/backend/global_assets/js/main/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="/backend/global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="/backend/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="/backend/assets/js/app.js"></script>
    <script src="/backend/global_assets/js/demo_pages/form_select2.js"></script>
</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-lg navbar-dark navbar-static">
        <div class="navbar-brand text-center text-lg-left">
            <a href="/" target="_blank" class="d-inline-block d-flex align-items-center">
                <img src="/backend/admin_logo.webp" class="d-none d-sm-block" alt=""
                    style="height: 35px; margin-right: 10px;">
                <span style="color: white; font-size: 14px;">International Chess Federation</span>
            </a>
        </div>

        <div class="d-flex justify-content-end align-items-center ml-auto">
            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                    <a href="/" class="navbar-nav-link">
                        <span class="d-none d-lg-inline-block ml-2">Home
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                <!-- Content area -->
                <div class="content d-flex justify-content-center align-items-center">

                    @yield('content')
                </div>
                <!-- /content area -->


                <!-- Footer -->
                <div class="navbar navbar-expand-lg navbar-light border-bottom-0 border-top">
                    <div class="text-center d-lg-none w-100">
                        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                            data-target="#navbar-footer">
                            <i class="icon-unfold mr-2"></i>
                            {{-- Footer --}}
                        </button>
                    </div>

                    <div class="navbar-collapse collapse" id="navbar-footer">
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
                <!-- /footer -->

            </div>
            <!-- /inner content -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>