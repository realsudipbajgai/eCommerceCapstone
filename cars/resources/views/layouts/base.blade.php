<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss', 'resources/sass/car_list.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
  />
    <title>Black Clover</title>
</head>

<body>

    <div class="wrapper">
        <header style="background-image: url('/images/home-background.png');">
            <div class="container-fluid header-topbar">
                <div class="d-flex flex-row-reverse">
                    
                    <div class=""><a class="nav-link" href="/cart">Cart</a></div>
                     <!-- Authentication Links -->
                     @guest
                            @if (Route::has('login'))
                            <div class=""><a class="nav-link" href="/login">Login</a></div>
                            @endif

                            @if (Route::has('register'))
                            <div class=""><a class="nav-link" href="/register">Register</a></div>
                            @endif
                        @else
                            <div class="dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/user/profile">
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="/orders">
                                        Orders
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                
                            </div>
                        @endguest
                        <form id="searchBarBox" action="{{ route('cars.search') }}" method="GET">
                            @csrf
                            <input name="search-result" id="search-result" type="text" placeholder="Search..">
                            <button type="submit"><img src="/images/icon/search.png" alt="search-icon"></button>
                        </form>
                </div>
            </div>
            <div class="container-fluid header-logo"><img src="/images/black_clover_logo_trans.png"
                    alt="black_clover_logo_trans"></div>
                    <nav class="navbar navbar-expand-lg navbar-dark" id="horizontal-nav">
                <div class="container px-5">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav nav-fill w-100">
                            <li class="nav-item"><a class="nav-link" aria-current="page" href="/">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="/cars">Cars</a></li>
                            <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="/contact/create">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Flash message partial view -->
        @include('partials.user_alert')

        <!-- Content goes here -->
        @yield('content')
        <div class="">
            <footer>
                @include('partials.footer')
            </footer>
        </div>
    </div>

    @stack('scripts')


</body>

</html>