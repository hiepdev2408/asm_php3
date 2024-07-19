<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admins/velzon/assets/images/favicon.ico') }}">

    @yield('style-libs')
    <!-- Layout config Js -->
    <script src="{{ asset('admins/velzon/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('admins/velzon/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admins/velzon/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admins/velzon/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('admins/velzon/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            @include('Backend.layouts.nav')
        </header>

        @include('Backend.layouts.sidebar')
        <div class="vertical-overlay"></div>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                @include('Backend.layouts.footer')
            </footer>
        </div>

    </div>
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>


    <!-- JAVASCRIPT -->
    <script src="{{ asset('admins/velzon/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admins/velzon/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admins/velzon/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('admins/velzon/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admins/velzon/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('admins/velzon/assets/js/plugins.js') }}"></script>

    @yield('script-libs')
    <!-- App js -->
    <script src="{{ asset('admins/velzon/assets/js/app.js') }}"></script>

    @yield('scripts')
</body>
</html>
