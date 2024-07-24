<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pustaka Buku</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    

    <!-- Inline CSS -->
    <style>
    .text-purple {
        color: purple; 
    }

    .btn-purple {
        background-color: purple; 
        color: white;
    }

    .btn-purple:hover {
        background-color: indigo; 
        color: white;
    }

    .text-orange {
        color: orange; 
        font-weight: bold;
    }

    .btn-orange {
        background-color: orange; 
    }

    .btn-orange:hover {
        background-color: darkorange; 
    }
    </style>

</head>

<body>
    <div id="app">
        <!-- Nav Bar -->
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand text-purple" href="{{ url('/') }}">
                    <img src="{{ asset('storage/asset/logo.png') }}" alt="Logo" height="40">
                    {{ 'Pustaka Buku' }}
                </a>
                
                <!-- Navbar Toggler Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar sebelah kiri-->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link text-purple" href="{{ route('home') }}">{{ __('Home') }}
                        </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-purple"
                                href="{{ route('index_product') }}">{{ __('Products') }}</a>
                        </li>
                        @if (Auth::check() && !Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link text-purple" href="{{ route('show_cart') }}">{{ __('Cart') }}</a>
                        </li>
                        @endif
                        @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link text-purple"
                                href="{{ route('index_order') }}">{{ __('Order') }}</a>
                        </li>
                        @endif
                    </ul>

                    <!-- Navbar sebelah kanan -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Autentikasi Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-purple" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-purple"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <!-- Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <!-- Dropdown Toggle Link -->
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-purple" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <!-- Dropdown Menu -->
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <!-- Profile Link -->
                                <a class="dropdown-item" href="{{ route('show_profile') }}"><i class="bi bi-person"></i>
                                Profile</a>
                                <!-- Divider -->
                                <div class="dropdown-divider"></div>
                                <!-- Logout Link -->
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right"></i>
                                    {{ __('Logout') }}
                                </a>

                                <!-- Logout Form -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>
