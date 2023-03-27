<x-app-layout>
    <x-slot:title>
        {{ __('Advert View') }}
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
                        <h5 style="color: white; text-decoration:none;">JKUAT ATTACHMENT PORTAL</h5>
                    </span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto nav-buttons">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}"
                                    class="nav-link font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                            </li>
                        @else
                            @if (Route::has('applicant.registration'))
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
        <main class="advert-view-main mb-5">
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
                    <h3>{{ $advert->title }}/Ref: {{ $advert->reference_number }}</h3>
                </div>
                <div class="card-body">
                    {{ $advert->description }}
                    @if (count($gen_reqs) > 0)
                        <h4>General Requirements</h4>
                        <ul>
                            @foreach ($gen_reqs as $gen_req)
                                <li>{{ $gen_req->value }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if (count($prof_reqs) > 0)
                        <h4>Professional Requirements</h4>
                        <ul>
                            @foreach ($prof_reqs as $prof_req)
                                <li>{{ $prof_req->value }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if (count($responsibilities) > 0)
                        <h4>Attachee Responsibilities</h4>
                        <ul>
                            @foreach ($responsibilities as $responsibility)
                                <li>{{ $responsibility->value }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="card-footer">
                    <h5>How to Apply</h5>
                    <div>
                        Please apply in English saving your CV and Motivation letter as a single document
                        indicating
                        the area you are interested in and the location. To apply, please visit our website at
                        https://kenya..net/. The deadline for receiving applications is 15th February 2022. Only
                        shortlisted applicants will be considered for interview.

                    </div>
                    <div class="d-flex justify-content-end align-items-center m-2">
                        <a href="/adverts/{{ $advert->id }}/apply" class="btn btn-success">{{ __('Apply') }}</a>
                    </div>
                </div>
            </section>
            <div class="mt-5"
                style="display: flex; flex-direction:column; align-items: center; justify-content: center; background-color: white;">
                <div class="d-flex flex-column align-items-center justify-content-center pt-4 px-5 mx-4"
                    style="position: relative; width: fit-content;">
                    <img src="/assets/static/iso-9001.jpg"
                        style="position: absolute; top: -40px; right: -20px; width: 68px;">
                    <img src="/assets/static/iso14001.png" alt=""
                        style="position: absolute; top: -40px; left: -20px; width: 70px;">
                    <div>JKUAT is ISO 9001:2015 and ISO 14001:2015
                        Certified.</div>
                    <div> Setting Trends in Higher Education,
                        Research, Innovation and Entrepreneurship</div>
                </div>
            </div>
        </main>
        <x-footer />
    </div>
</x-app-layout>
