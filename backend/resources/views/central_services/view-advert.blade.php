@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-central-services-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div id="main-content">

                <section class="">
                    <div class="page-title">
                        <h2>View Advert</h2>
                    </div>
                    <div class="advert-details">
                        <div style="margin-bottom: 30px;">
                            <div
                                style="display: flex; flex-direction:row; align-items:center; justify-content:space-between;">
                                <h5>Title : </h5>
                                <a href="#" class=" btn btn-primary action-button">{{ __('Edit Advert') }}</a>
                            </div>
                            <div style="display: flex; flex-direction:row; align-items:center; margin:0 0 20px 20px;">
                                <img src="/assets/static/logo.png" alt="Logo"
                                    style="height: 40px; width:40px; margin-right:20px;">
                                <div>{{ $advert->title }}</div>
                            </div>
                        </div>
                        <div style="margin-bottom: 20px;">
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
                        </div>

                        <div>
                            <h5>Description : </h5>
                            <div class="advert-view">
                                <div>{{ $advert->description }}</div>
                                <h5>Requirements</h5>
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

                                <h5>How to Apply</h5>
                                <div>
                                    Please apply in English saving your CV and Motivation letter as a single document
                                    indicating
                                    the area you are interested in and the location. To apply, please visit our website at
                                    https://kenya..net/. The deadline for receiving applications is 15th February 2022. Only
                                    shortlisted applicants will be considered for interview.

                                </div>
                            </div>
                        </div>
                        <div
                            style="display:flex; flex-direction:row; justify-content:flex-end; margin: 20px 0; padding-right:20px;">
                            <button class="btn action-button btn-danger" style="border: none;">Reject</button>
                            <button class="btn action-button btn-success"
                                style="border: none; margin-left:20px;">Approve</button>
                        </div>
                    </div>
                </section>


            </div>
            <x-footer />
        </div>

    </div>
@endsection
