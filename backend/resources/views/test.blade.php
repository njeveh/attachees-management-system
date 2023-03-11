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

</head>

<body>
    <div class="posts-wrapper d-flex">
        <div id="side-menu" class="side-menu">
            <div id="side-menu-collapse">
                <button type="button" class="btn btn-primary side-menu-btn m-2">Close</button>
            </div>
            <div class="pt-5">
                <div>
                    <p>Filter by departments</p>
                    <div class="">
                        @if ($department_objects->count() > 0)
                            @foreach ($department_objects as $department_object)
                                <div class="form-check">
                                    <input wire:model="departments.{{ $department_object->id }}"
                                        class="form-check-input" type="checkbox" value="{{ $department_object->id }}"
                                        id="flexCheckDefault-{{ $department_object->id }}">
                                    <label class="form-check-label" for="flexCheckDefault-{{ $department_object->id }}">
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
        <div class="posts-listing flex-grow-1 mx-4">
            <div class="">
                <div class="">
                    <div class="">
                        <div class="d-flex justify-content-start home-page-buttons">
                            <button type="button" id="side-menu-btn" class="btn btn-primary side-menu-btn m-2">More
                                Filters</button>
                            <button type="reset" wire:click="resetFilters()"
                                class="filters-reset m-2 btn btn-secondary">Reset
                                filters</button>
                        </div>
                        <div class="">
                            <h3 class="d-flex justify-content-center">Featured Opportunities</h3>
                            <div class="job-list">
                                @for ($j = 0; $j < 20; ++$j)
                                    <div class="job-item">
                                        <div class="organization-details">
                                            <div class="organization-logo">
                                                <img src="/assets/static/logo.png" alt="logo">
                                            </div>
                                            <div>
                                                <p>Advert Title</p>
                                                <p class="sm-text"><span>JKUAT</span><span>Juja</span></p>
                                            </div>
                                        </div>
                                        <div class="post-action">
                                            <a href="#" class="btn btn-success">View</a>
                                            <a class="sm-text">{{ date_create(time()) }}</a>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="search-section posts-listing flex-grow-1 mx-4">
                <div class="search-form">
                    <form action="" class="py-3 d-flex justify-content-center flex-wrap">
                        <div class="mx-2 my-2">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-home"></i></span>
                                <input wire:model="search" type="text" placeholder="Search">
                            </div>
                        </div>
                        <div class="college-filter mx-2 my-2">
                            <select class="form-select" id="styledSelect1" wire:model="department">
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
                <div class="container-fluid search-display">
                    <div class="" style="display: flex;">
                        <div class="content-display">
                            <div class="d-flex justify-content-start home-page-buttons">
                                <button type="button" data-bs-toggle="offcanvas" data-bs-target="#side-menu"
                                    class="btn btn-primary side-menu-btn m-2">More Filters</button>
                                <button type="reset" wire:click="resetFilters()"
                                    class="filters-reset m-2 btn btn-secondary">Reset
                                    filters</button>
                            </div>
                            <div class="job-posts">
                                <h3 class="d-flex justify-content-center">Featured Opportunities</h3>
                                <div class="job-list">
                                    @if ($adverts->count() > 0)
                                        @foreach ($adverts as $advert)
                                            <div class="job-item">
                                                <div class="organization-details">
                                                    <div class="organization-logo">
                                                        <img src="/assets/static/logo.png" alt="logo">
                                                    </div>
                                                    <div>
                                                        <p>{{ $advert->title }}</p>
                                                        <p class="sm-text"><span>JKUAT</span><span>Juja</span></p>
                                                    </div>
                                                </div>
                                                <div class="post-action">
                                                    <a href="{{ '/adverts/' . $advert->id }}"
                                                        class="btn btn-success">View</a>
                                                    <a
                                                        class="sm-text">{{ date_format($advert->created_at, 'd-M-Y') }}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- <div class="my-5"> {{ $adverts->links() }} </div> --}}
                                    @else
                                        <div class="d-flex justify-content-center">No Featured Opportunities Yet</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
</body>

</html>
