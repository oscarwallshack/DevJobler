<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/job.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profiles.css') }}" rel="stylesheet">



</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ URL('storage/img/logo.png') }}" width="30" height="30"
                        class="d-inline-block align-top" alt="devjobler">
                    <b>DevJobler</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" class="ml-auto" href="/">Oferty pracy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" class="ml-auto" href="/firmy-it">Profile firm</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" class="ml-auto" href="/specjalisci-it">Specjaliści IT</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item mx-1 nav-item-border">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Zaloguj') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item mx-1 nav-item-border">
                                    <a class="nav-link"
                                        href="{{ route('register') }}">{{ __('Zarejestruj') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                {{-- ---- ######## MENU WIDOCZNE PO ZALOGOWANIU ########  ---- --}}

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    {{-- ---- for employees ---- --}}
                                    @can('isEmployee')
                                        <a class="dropdown-item" href="{{ route('employees.index') }}"><i
                                                class="far fa-user-circle"></i> Profil</a>

                                        <a class="dropdown-item" href="{{ route('employees.edit') }}"><i
                                                class="fa fa-user-edit"></i> Edytuj profil</a>
                                    @endcan
                                    {{-- ---- for companies ---- --}}
                                    @can('isCompany')

                                        <a class="dropdown-item" href="{{ route('companies.index') }}"><i
                                                class="far fa-user-circle"></i> Profil firmy</a>

                                        <a class="dropdown-item" href="{{ route('companies.edit') }}"><i
                                                class="fa fa-user-edit"></i> Edytuj profil firmowy</a>
                                        <a class="dropdown-item" href="{{ route('offers.create') }}"><i
                                                class="fas fa-plus"></i> Nowa oferta</a>
                                        <a class="dropdown-item" href="{{ route('offers.index') }}"><i
                                                class="fas fa-list"></i> Twoje oferty</a>
                                    @endcan


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                                                                             document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Wyloguj
                                    </a>

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

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer id="sticky-footer" class="footer flex-shrink-0 navbar-light py-2 m-0 bg-white shadow">
        <div class="text-center">
            <img src="{{ URL('storage/img/logo.png') }}" width="20" height="20" class="d-inline-block align-top"
                alt="devjobler">
            <b class="pr-2">DevJobler</b>&copy;Bartosz Walczak
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        @yield('javascript')
    </script>
    @yield('js-files')


</body>


</html>
