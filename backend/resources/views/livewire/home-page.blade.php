<div>
    <x-slot:title>
        {{ __('Home') }}
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
                <form class="d-flex ms-auto me-2">
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-search"></i></span>
                        <input wire:model="searchOne" class="form-control shadow-none" type="text"
                            placeholder="Search">
                    </div>
                </form>
                <ul class="navbar-nav me-2 nav-buttons">
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
    <div class="guest-content-wrapper">
        <main class="pb-5">
            <!-- Carousel -->
            <div id="home-page-carousel" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#home-page-carousel" data-bs-slide-to="0"
                        class="active indicator"></button>
                    <button type="button" data-bs-target="#home-page-carousel" data-bs-slide-to="1"
                        class="indicator"></button>
                    <button type="button" data-bs-target="#home-page-carousel" data-bs-slide-to="2"
                        class="indicator"></button>
                </div>

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/assets/static/istockphoto-1204089458-170667a.jpg" alt="JKUAT ATTACHMENT PORTAL"
                            class="d-block w-100">
                        <div class="carousel-caption">
                            <h1>Find Attachment Opportunites</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/static/istockphoto-1204089458-170667a.jpg" alt="JKUAT ATTACHMENT PORTAL"
                            class="d-block w-100">
                        <div class="carousel-caption">
                            <h1>Find Attachment Opportunites</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/static/istockphoto-1204089458-170667a.jpg" alt="JKUAT ATTACHMENT PORTAL"
                            class="d-block w-100">
                        <div class="carousel-caption">
                            <h1>Find Attachment Opportunites</h1>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#home-page-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#home-page-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
            {{-- end of couresel --}}
            <div>
                <div class="posts-wrapper d-flex">
                    <div id="side-menu" class="side-menu {{ $side_menu_class }}">
                        <div class="sticky">
                            <div id="side-menu-collapse-btn-container">
                                <button id="side-menu-collapse" type="button" wire:click="toggleClass()"
                                    class="btn-close m-2"></button>
                            </div>
                            <div class="pt-5">
                                <p>Filter by department group</p>
                                <div class="">
                                    @if ($department_objects->count() > 0)
                                        @foreach ($department_objects as $department_object)
                                            <div class="form-check">
                                                <input wire:model="departments.{{ $department_object->id }}"
                                                    class="form-check-input" type="checkbox"
                                                    value="{{ $department_object->id }}"
                                                    id="flexCheckDefault-{{ $department_object->id }}">
                                                <label class="form-check-label"
                                                    for="flexCheckDefault-{{ $department_object->id }}">
                                                    {{ $department_object->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div wire:click="resetFilters()" class="filters-reset">
                                <button type="reset">Reset filters</button>
                            </div>
                        </div>

                    </div>

                    <section class="search-section posts-listing flex-grow-1 mx-4">
                        <div class="search-form">
                            <form action="" class="py-1 d-flex justify-content-center flex-wrap">
                                <div class="mx-2 my-1">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-search"></i></span>
                                        <input class="" wire:model="searchTwo" type="text"
                                            placeholder="Search">
                                    </div>
                                </div>
                                <div class="college-filter mx-2 my-2">
                                    <select class="form-select" id="styledSelect1" wire:model="department">
                                        <option value=''>
                                            Filter By Department
                                        </option>
                                        <option value="0">
                                            All departments
                                        </option>
                                        @if ($department_objects->count() > 0)
                                            @foreach ($department_objects as $department_object)
                                                <option value={{ $department_object->id }}>
                                                    {{ $department_object->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="">
                            <div class="sticky-btns">
                                <div class="d-flex justify-content-start home-page-buttons pt-2">
                                    <button type="button" wire:click="toggleClass()"
                                        class="btn btn-primary m-2">More
                                        Filters</button>
                                    <button type="reset" wire:click="resetFilters()"
                                        class="filters-reset m-2 btn btn-secondary">Reset
                                        filters</button>
                                </div>
                                <x-loading-state-indicators />
                            </div>

                            <div class="job-posts px-2">
                                <h1 class="d-flex justify-content-center">Featured Opportunities</h1>
                                <div class="items-list">
                                    @if ($adverts->count() > 0)
                                        <div class="mt-4 p-5 text-light rounded  bg-info" style="font-size: 20px;">
                                            All currently featured Opportunities are open for applications upto
                                            <strong class=" p-2 rounded me-1"
                                                style="background-color:white; color:red">{{ $next_year_quarter_data['application_deadline'] }}</strong>.
                                            If
                                            accepted, applicants
                                            will be offered an
                                            opportunity to be attached at JKUAT for the period starting from
                                            <strong
                                                class="text-dark">{{ $next_year_quarter_data['start_date'] }}</strong>
                                            to
                                            <strong
                                                class="text-dark">{{ $next_year_quarter_data['end_date'] }}<strong>.
                                        </div>
                                        @foreach ($adverts as $advert)
                                            <div class="list-item row">
                                                <div
                                                    class="col-12 col-md-5 d-flex align-content-center justify-content-start my-2">
                                                    <div class="d-flex align-content-center align-items-center">
                                                        <div class="organization-logo">
                                                            <img src="/assets/static/logo.png" alt="logo">
                                                        </div>
                                                        <h5>{{ $advert->title }}</h5>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-12 col-md-5 d-flex align-items-center justify-content-start my-2">
                                                    <h5>Ref: {{ $advert->reference_number }}</h5>
                                                </div>
                                                <div
                                                    class="post-action col-12 col-md-2 d-flex align-items-center justify-content-end my-2">
                                                    <a href="{{ '/adverts/' . $advert->id }}"
                                                        class="btn btn-success">View</a>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="my-5 d-flex justify-content-center">{{ $adverts->links() }} </div>
                                    @else
                                        <div class="d-flex justify-content-center">
                                            No Featured Opportunities Yet
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </main>

        <x-footer />
    </div>
</div>
