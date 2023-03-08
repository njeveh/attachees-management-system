@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-department-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div id="main-content" class="pb-3">
                <div class="page-title">
                    <h3>{{ $advert->reference_number }}</h3>
                </div>
                <section>
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
                    <div>
                        <h4>No. of Vacancies</h4>
                        <ul>
                            <li>Cohort 1: {{ $advert->cohort1_vacancies }}</li>
                            <li>Cohort 2: {{ $advert->cohort2_vacancies }}</li>
                            <li>Cohort 3: {{ $advert->cohort3_vacancies }}</li>
                            <li>Cohort 4: {{ $advert->cohort4_vacancies }}</li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-end align-content-center mb-3">
                        <a href="./update-advert.php" class="btn btn-primary">Edit</a>
                    </div>
                </section>
            </div>
            <x-footer />
        </div>

    </div>
@endsection
