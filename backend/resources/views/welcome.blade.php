<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/static/favicon.ico">


    <title>AIMS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body>
    <main>
        <div id="main-page-nav">
            <nav class="navbar">
                <a href="#">
                    <div class="logo-brand">
                        <div class="logo">

                            <img src="/assets/static/logo.png" alt="logo">
                        </div>
                        <span>
                            <!-- JOMO KENYATTA UNIVERSITY OF AGRICULTURE AND TECHNOLOGY
                        <br /> -->
                            <h5 style="color: white; text-decoration:none;">JKUAT ATTACHMENT PORTAL</h5>
                        </span>
                    </div>
                </a>
                <div class="nav-buttons">
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                            @else
                                @if (Route::has('attachee.registration'))
                                    <a href="{{ route('attachee.registration') }}"
                                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif
                                <a href="{{ route('login') }}"
                                    class="login-button font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Sign
                                    in</a>
                            @endauth
                        </div>
                    @endif
                </div>
            </nav>
        </div>
        @livewire('show-adverts')
        <x-footer />
    </main>
    @livewireScripts
</body>

</html>
