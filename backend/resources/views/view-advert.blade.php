<x-app-layout>
    <div class="content-wrapper">
        <main class="content">
            <div id="main-page-nav">
                <nav class="navbar">
                    <a href="{{ route('welcome.page') }}">
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
            <section class="mx-5 advert">
                <div>
                    <h3>Ref: {{ $advert->reference_number }}</h3>
                </div>
                <div>
                    <h3>{{ $advert->title }}</h3>
                </div>
                <div>
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
                <div>
                    <h4>Year: {{ $advert->year }}</h4>
                </div>

                <h5>How to Apply</h5>
                <div>
                    Please apply in English saving your CV and Motivation letter as a single document
                    indicating
                    the area you are interested in and the location. To apply, please visit our website at
                    https://kenya..net/. The deadline for receiving applications is 15th February 2022. Only
                    shortlisted applicants will be considered for interview.

                </div>
            </section>
        </main>
        <x-footer />
    </div>
</x-app-layout>
