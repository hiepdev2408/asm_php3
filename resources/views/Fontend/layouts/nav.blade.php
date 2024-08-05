<div class="container">
    <nav class="navbar navbar-expand-lg navbar-white">
        <a class="navbar-brand order-1" href="{{ route('client.') }}">
            <img class="img-fluid" width="100px" src="{{ asset('clients/reader/images/logo.png') }}"
                alt="Reader | Hugo Personal Blog Template">
        </a>
        <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ route('client.') }}">
                        Trang chủ</i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Danh mục <i class="ti-angle-down ml-1"></i>
                    </a>
                    <div class="dropdown-menu">
                        @foreach ($categories as $key => $category)
                            <a class="dropdown-item" href="{{ route('client.search', $key) }}">{{ $category }}</a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('client.loadAllPost') }}">Bài viết</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="shop.html">Liên hệ</a>
                </li>
            </ul>
        </div>

        <div class="order-2 order-lg-3 d-flex align-items-center">



            @if (Route::has('client.auth.login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <i class="ti-angle-down ml-1"></i>
                                </a>
                                <div class="dropdown-menu">
                                    @if (Auth::user()->type == 'admin')
                                        <a class="dropdown-item" href="about-me.html">Profice</a>
                                        <a class="dropdown-item" href="{{ route('admin.') }}">Admin</a>
                                        <form action="{{ route('client.auth.logout') }}" method="post">
                                            @csrf
                                            <button style="outline: none; border: none; background-color: white">Đăng
                                                xuất</button>
                                        </form>
                                    @else
                                        <a class="dropdown-item" href="about-me.html">Profice</a>
                                        <form action="{{ route('client.auth.logout') }}" method="post">
                                            @csrf
                                            <button style="outline: none; border: none; background-color: white">Đăng
                                                xuất</button>
                                        </form>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    @else
                        <a href="{{ route('client.auth.login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('client.auth.register'))
                            <a href="{{ route('client.auth.register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>

    </nav>
</div>
