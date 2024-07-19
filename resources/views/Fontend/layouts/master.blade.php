<!DOCTYPE html>
<html lang="en-us">
<head>
    @include('Fontend.layouts.head')
</head>

<body>
    <!-- navigation -->
    <header class="navigation fixed-top">
        @include('Fontend.layouts.nav')
    </header>

    @yield('content')

    <footer class="footer">
        @include('Fontend.layouts.footer')
    </footer>
    @include('Fontend.layouts.script')

</body>

</html>

