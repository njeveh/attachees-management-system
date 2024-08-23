<x-app-layout>
    <x-slot:title>
        {{ __('Contacts') }}
    </x-slot:title>
    <nav id="guest-nav" class="navbar navbar-expand-sm navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('welcome.page') }}">
                <div class="logo-brand">
                    <div class="logo">

                        <img src="/assets/static/logo.png" alt="logo">
                    </div>
                    <span>
                        <!-- JOMO KENYATTA UNIVERSITY OF AGRICULTURE AND TECHNOLOGY
                                                                                                                                                            <br /> -->
                        <h5 style="color: white; text-decoration:none;">JKUAT INDUSTRIAL ATTACHMENT PORTAL</h5>
                    </span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto nav-buttons">
                    @if(Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}"
                                    class="nav-link font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                            </li>
                        @else
                            @if(Route::has('applicant.registration'))
                                <li class="nav-item">
                                    <a href="{{ route('applicant.registration') }}"
                                        class="nav-link ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('login') }}"
                                    class="nav-link login-button font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Sign
                                    in</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="guest-content-wrapper d-flex flex-column">
        <main class="advert-view-main py-5 mb-5 px-3">
            <header class="header">
                <div align="center" class="logo justified">
                    <img src="/assets/static/logo.png" alt="JKUAT LOGO" width="100px">
                </div>
                <div align="center" class="justified">
                    <h3>JOMO KENYATTA UNIVERSITY OF AGRICULTURE AND TECHNOLOGY</h3>
                </div>
                <div align="center" class="justified">
                    <p class="justified">P.O. BOX 62000-00200, CITY SQUARE, NAIROBI, KENYA.<br>TELEPHONE: (067)
                        52711/52181-4. FAX: 52164, THIKA</p>
                </div>
            </header>
            <section class="m-2 advert card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="d-flex flex-row flex-wrap align-items-center text-sm gap-2 p-4">
                        <div class="d-flex flex-row align-items-center gap-2">
                            <x-phone_icon class="w-8 fill-blue-600" />
                            <h3 class="text-blue-600">Phone:</h3>
                        </div>
                        <div>+2547xxxxxxxx</div>
                    </div>
                    <div class="d-flex flex-row flex-wrap align-items-center text-sm gap-2 p-4">
                        <div class="d-flex flex-row align-items-center gap-2">
                            <x-email_icon class="w-8 fill-blue-600" />
                            <h3 class="text-blue-600">Email:</h3>
                        </div>
                        <div>info@jkuat.ac.ke</div>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </section>
        </main>
        <x-footer />
    </div>
</x-app-layout>
