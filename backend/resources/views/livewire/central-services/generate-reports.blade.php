<div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-central-services-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content" class="mb-5">
                <div class="fixed-filters bg-light">
                    <x-loading-state-indicators />

                    <div class="row">
                        <div class="col form-group mb-3">
                            <label for="cohort">Cohort:</label>
                            <select class="form-select" id="cohort" wire:model='cohort'>
                                <option value="1">Cohort 1</option>
                                <option value="2">Cohort 2</option>
                                <option value="3">Cohort 3</option>
                                <option value="4">Cohort 4</option>
                            </select>
                        </div>
                        <div class="col form-group mb-3">
                            <label for="year">Year:</label>
                            <select class="form-select" id="year" wire:model="year">
                                @for ($option_year = date('Y'); $option_year > 2021; --$option_year)
                                    <option value="{{ $option_year }}/{{ $option_year + 1 }}">
                                        {{ $option_year }}/{{ $option_year + 1 }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="col form-group mb-3">
                            <label for="department">Department:</label>
                            <select class="form-select" id="department" wire:model='department'>
                                <option value="">All departments</option>
                                @foreach ($departments as $option_department)
                                    <option value="{{ $option_department->id }}">{{ $option_department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if (session('message'))
                        <div class="alert alert-danger d-flex flex-row justify-content-between">
                            <div>{{ session('message') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                </div>
                <section class="">
                    <div class="page-title">
                        <h2>Attachee Quarterly Attendance Report</h2>
                    </div>
                    <div class="container-fluid">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="" scope="col">ATTACHEE NAME</th>
                                    <th class="" scope="col">CONTACT</th>
                                    <th class="" scope="col">ID/NO</th>
                                    <th class="" scope="col">SEX</th>
                                    <th class="" scope="col">PWDS</th>
                                    <th class="" scope="col">INSTITUTION</th>
                                    <th class="" scope="col">SECTION ATTACHED</th>
                                    <th class="" scope="col">AREA OF STUDY</th>
                                    <th class="" scope="col">LEVEL OF EDUCATION</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($attachees->count())
                                    @foreach ($attachees as $attachee)
                                        <tr>
                                            <td>{{ $attachee->applicant->first_name }}&nbsp;
                                                {{ $attachee->applicant->second_name }}
                                            </td>
                                            <td>{{ $attachee->applicant->phone_number }}</td>
                                            <td>{{ $attachee->applicant->national_id }}</td>
                                            <td>{{ $attachee->applicant->applicantBiodata->sex }}</td>
                                            <td>
                                                @php
                                                    echo $attachee->applicant->applicantBiodata->disability == null ? 'No' : 'Yes';
                                                @endphp
                                            </td>
                                            <td>{{ $attachee->applicant->institution }}</td>
                                            <td>{{ $attachee->department->name }}</td>
                                            <td>{{ $attachee->applicant->applicantBiodata->course_of_study }}</td>
                                            <td>{{ $attachee->applicant->applicantBiodata->level_of_study }}</td>
                                            <td>
                                                <a href="{{ Storage::url($attachee->application->applicationAccompaniments->where('name', 'offer_acceptance_form')->first()->path) }}"
                                                    class="btn btn-success text-nowrap">
                                                    Acceptance Letter
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10">

                                            <h2>Nothing to show</h2>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <form action="{{ route('central_services.reports_download') }}" method="POST">
                            @csrf
                            <input type="hidden" name="department" value="{{ $department }}">
                            <input type="hidden" name="year" value="{{ $year }}">
                            <input type="hidden" name="cohort" value="{{ $cohort }}">
                            <button type="submit" class="btn btn-primary m-2">Generate
                                Report</button>
                        </form>
                        <button type="button" class="btn btn-primary m-2"
                            wire:click='downloadAcceptanceLetters'>Download Acceptance Letters</button>
                    </div>
                </section>
            </main>
            <x-footer />
        </div>

    </div>
</div>
