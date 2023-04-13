<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <title>BoolBnB</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    {{-- FontAwsome --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.css'
        integrity='sha512-+ouAqATs1y4kpPMCHfKHVJwf308zo+tC9dlEYK9rKe7kiP35NiP+Oi35rCFnc16zdvk9aBkDUtEO3tIPl0xN5w=='
        crossorigin='anonymous' />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    {{-- Style scss --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- TomTOM JS -->
    <script src="{{ asset('js/showGuest.js') }}" defer></script>

    {{-- Map TOM TOM --}}
    <link rel="stylesheet" type="text/css"
        href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.23.0/maps/maps.css" />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.23.0/maps/maps-web.min.js"></script>


    <script src="{{ asset('js/axios.js') }}"></script>



</head>

<body>
    {{-- LOGIN --}}
    <div id="login_elem"
        class="container log_custom_none transition_custom position-absolute z-2 top-50 start-50 translate-middle">

        <div class="row justify-content-center">
            <div class="col-md-8">


                {{-- Card --}}
                <div class="card">
                    {{-- CArd Header Login --}}
                    <div class="card-header d-flex justify-content-between">
                        {{ __('Login') }}
                        {{-- close elem --}}
                        <span onclick="document.getElementById('login_elem').classList.add('log_custom_none');"
                            class="cursor_pointer">
                            <i class="fa-solid fa-x"></i>
                        </span>
                    </div>

                    {{-- Body Login --}}
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Register --}}
    <div id="register_elem"
        class="container log_custom_none transition_custom position-absolute z-2 top-50 start-50 translate-middle">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('Register') }}
                        {{-- close elem --}}
                        <span onclick="document.getElementById('register_elem').classList.add('log_custom_none');"
                            class="cursor_pointer">
                            <i class="fa-solid fa-x"></i>
                        </span>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- NavBar --}}
    <header class="container-fluid py-3 border-bottom">
        <nav class="row">
            <div class="col-10 m-auto d-flex justify-content-around">

                {{-- Logo --}}
                <div class="logo_cnt">
                    <a href="/">
                        <img src="{{ asset('assets/Logo.svg') }}" alt="logo">
                    </a>

                </div>


                {{-- Search --}}
                <div>
                    <form class="d-flex text-center" role="search">
                        <input type="text" name="search_text" id="search_text" class="form-control rounded-pill"
                            placeholder="Search" aria-label="Search">

                        {{-- Ricerca avanzata --}}
                        <i onclick="
                                var elem = document.getElementById('advanced_search_cont');
                                elem.classList.toggle('advanced_search_cst');"
                            class="cursor_pointer d-flex align-items-center ms-1 fa-solid fa-arrow-down-short-wide"></i>
                    </form>


                </div>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    <div class="btn-group">
                        <button type="button" class="rounded-pill btn btn-light dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">

                            <i class="fa-solid fa-user ms-2"></i>
                        </button>
                        @guest


                            {{-- Item DorpDown --}}
                            <ul class="dropdown-menu dropdown-menu-end">
                                {{-- Login --}}
                                <li>
                                    <button
                                        onclick="
                                        
                                    document.getElementById('login_elem').classList.remove('log_custom_none');
                                    document.getElementById('register_elem').classList.add('log_custom_none');"
                                        id="login_btn" class="dropdown-item">
                                        Login
                                    </button>
                                </li>


                                {{-- Register --}}
                                <li>
                                    <button
                                        onclick="
                                    document.getElementById('register_elem').classList.remove('log_custom_none');
                                    document.getElementById('login_elem').classList.add('log_custom_none');
                                    "
                                        id="register_btn" class="dropdown-item">
                                        Register
                                    </button>
                                </li>

                            </ul>
                        @else
                            {{-- <li class="nav-item dropdown"> --}}
                            {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a> --}}

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                {{-- HOme --}}
                                <a class="dropdown-item" href="{{ route('guest') }}">
                                    Home
                                </a>

                                {{-- Create --}}
                                <a class="dropdown-item" href="{{ route('admin.apartments.create') }}">
                                    Add Apartment
                                </a>

                                {{-- My apartments --}}
                                <a class="dropdown-item" href="{{ route('admin.apartments.index') }}">
                                    My Apartments
                                </a>

                                {{-- DashBoard --}}
                                <a class="dropdown-item" href="{{ route('admin.index') }}">
                                    Dashboard
                                </a>

                                {{-- LogOut --}}
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            {{-- </li>s --}}
                        @endguest
                    </div>
                </ul>



            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>



    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    {{-- MAP TOM TOM --}}
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.52.0/maps/maps-web.min.js"></script>
    
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script src="{{ asset('js/axios.js') }}"></script>
</body>

</html>
