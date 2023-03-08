@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-department-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div id="main-content">
                <div class="page-title">
                    <h3>New Advert</h3>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger py-1" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <section>
                    <form class="mt-3" method="POST" action="{{ route('departments.new_advert_create') }}">
                        @csrf
                        <!-- New Advert -->
                        <div class="container">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
                            </div>
                            <div class="mb-3">
                                <h4>General Requirements</h4>
                                <ol id="general-requirements-container">
                                    <li class="mb-3" id="0">
                                        <textarea class="form-control mb-3" name="gen_req[]" rows="2" required></textarea>
                                    </li>
                                </ol>
                                <div class="container  d-flex justify-content-end align-content-center  mb-3">
                                    <button class="btn btn-success" id="add-advert-gen-requirement-input-field-btn"
                                        type="button">
                                        Add input field
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h4>Professional Requirements</h4>
                                <ol id="prof-requirements-container">
                                    <li class="mb-3" id="0">
                                        <textarea class="form-control mb-3" name="prof_req[]" rows="2" required></textarea>
                                    </li>
                                </ol>
                                <div class="container  d-flex justify-content-end align-content-center  mb-3">
                                    <button class="btn btn-success" id="add-advert-prof-requirement-input-field-btn"
                                        type="button">
                                        Add input field
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <h4>Responsibilites of Intern</h4>
                                <ol id="intern-responsibilities-container">
                                    <li class="mb-3" id="0">
                                        <textarea class="form-control mb-3" name="intern_responsibilities[]" rows="2" required></textarea>
                                    </li>
                                </ol>
                                <div class="container d-flex justify-content-end align-content-center mb-3">
                                    <button class="btn btn-success" id="add-advert-intern-responsibility-input-field-btn"
                                        type="button">
                                        Add input field
                                    </button>
                                </div>
                            </div>
                            <div class="form-group flex-column mb-3">
                                <label for="advert-year">Year:</label>
                                <select class="form-control" id="advert-year" name="year">
                                    <option>{{ date('Y') . '/' . date('Y') + 1 }}</option>
                                    <option>{{ date('Y') - 1 . '/' . date('Y') }}</option>
                                </select>
                            </div>
                            <h4>No. of vacancies</h4>

                            <div class="mb-3">
                                <label for="cohort-1-vacancies" class="form-label">Cohort 1</label>
                                <input type="number" name="cohort1_vacancies" class="form-control" id="cohort-1-vacancies"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="cohort-2-vacancies" class="form-label">Cohort 2</label>
                                <input type="number" name="cohort2_vacancies" class="form-control" id="cohort-2-vacancies"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="cohort-3-vacancies" class="form-label">Cohort 3</label>
                                <input type="number" name="cohort3_vacancies" class="form-control" id="cohort-3-vacancies"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="cohort-4-vacancies" class="form-label">Cohort 4</label>
                                <input type="number" name="cohort4_vacancies" class="form-control" id="cohort-4-vacancies"
                                    required>
                            </div>

                            <div class="d-flex justify-content-end align-content-center mb-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <x-footer />
        </div>

    </div>
@endsection
