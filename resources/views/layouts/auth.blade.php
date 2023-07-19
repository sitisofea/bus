<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

     <!-- Favicon -->
     <link rel="shortcut icon" href="../../img/logoM.png" />

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ asset('css/bundle.css') }}" type="text/css">

    @yield('head')

    <!-- App styles (Main CSS) -->
    <link rel="stylesheet" href="{{ asset('css/app.min.css?v=2.6') }}" type="text/css">

    <!-- Icon -->
    <link rel="stylesheet" href="path/to/ti-icons.css">
    @yield('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a href="{{ url('/dashboard') }}">
                <img class="logo" src="../../img/logoM.png" width="100" height=auto
                    alt="logo">
            </a>
            @guest
                <a class="navbar-brand" href="{{ URL('/') }}">Login</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            @else
                {{-- <a class="navbar-brand" href="{{ URL('/') }}">MaraLiner</a> --}}
                <div class="row">
                    <div class="col">
                        <div class="horizontal-navigation">
                            <ul class="nav">
                                <li @if (request()->segment(1) == 'dashboard') class="open" @endif>
                                {{-- <li class="nav-item @if (request()->segment(1) == '') active @endif"> --}}
                                    <a class="nav-link text-dark" href="{{ route('dashboard') }}"><i class="ti-home mr-2"></i>Dashboard</a>
                                </li>
                                <li @if (request()->segment(1) == 'sms') class="open" @endif>
                                {{-- <li class="nav-item @if (request()->segment(1) == '') active @endif"> --}}
                                    <a class="nav-link text-dark" href="{{ route('sms.index') }}"><i class="ti-layers mr-2"></i>SMS</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            @endguest

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('login') ? 'active' : '' }}"
                                href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('register') ? 'active' : '' }}"
                                href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="px-3 py-5">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    @yield('script')
</body>

</html>
