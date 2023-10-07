<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Dashbaord</title>
    <link rel="stylesheet"
        href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts-->
    <!-- Data table CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js">
    </script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0-beta.1">
    </script>


    @vite(['resources/sass/dashboard.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/admin">
                    Dashboard
                </a>
                <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse"
                    id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/users">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/cars">Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="/admin/categories">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/brands">Brands</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/orders">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="/admin/inquiries">Inquiries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="/admin/reviews">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="/admin/provinces">Provinces</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="/admin/discounts">Discounts</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link"
                                href="/login">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link"
                                href="/register">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown"
                                class="nav-link dropdown-toggle" href="#"
                                role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"
                                v-pre>
                                {{ Auth::user()->first_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/logout"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="/logout"
                                    method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('partials.alert')
            @yield('content')
        </main>
    </div>
    @yield('scripts')

</body>

</html>