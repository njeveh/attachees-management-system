<div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-central-services-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content" class="mb-5">
                <section class="">
                    <div class="page-title">
                        <h2>Applications</h2>
                    </div>
                    <div class="display-box">
                        <div class="row fixed-filters">
                            <div class="col form-group">
                                <label for="department">Department:</label>
                                <select class="form-select" id="department" wire:model='department'>
                                    <option value="">All departments</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col form-group mb-1">
                                <label for="cohort">Cohort:</label>
                                <select class="form-select" id="cohort" wire:model='cohort'>
                                <option value="">All Cohorts</option>
                                    <option value="1">Cohort 1</option>
                                    <option value="2">Cohort 2</option>
                                    <option value="3">Cohort 3</option>
                                    <option value="4">Cohort 4</option>
                                </select>
                            </div> --}}
                            <div class="col form-group">
                                <label for="year">Year:</label>
                                <select class="form-select" id="year" wire:model="year">
                                    <option value="">All</option>
                                    @for ($year = date('Y'); $year > 2021; --$year)
                                        <option value="{{ $year }}/{{ $year + 1 }}">
                                            {{ $year }}/{{ $year + 1 }}</option>
                                    @endfor
                                </select>
                            </div>
                            <x-loading-state-indicators />
                        </div>
                        <section class="overflow-auto">
                            <table class="table table-sm table-responsive table-bordered table-striped my-2">
                                <thead>
                                    <tr class="">
                                        <th colspan='13'>
                                            <div class="d-flex align-content-center justify-content-start">
                                                <div>
                                                    <button class="btn btn-secondary"
                                                        wire:click="resetAllFilters()">Reset
                                                        Filters</button>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="custom-border" scope="col">No.</th>                                        
                                        <th class="custom-border" scope="col">Area of Study</th>
                                        <th class="custom-border" scope="col">Department</th>
                                        <th class="custom-border" scope="col">Year</th>
                                        <th class="custom-border" scope="col">Vacancies</th>
                                        <th class="custom-border" scope="col">Applications</th>
                                        <th class="custom-border" scope="col">Processed</th>
                                        <th class="custom-border" scope="col">Pending</th>
                                        <th class="custom-border" scope="col">Accepted</th>
                                        <th class="custom-border" scope="col">Revoked</th>
                                        <th class="custom-border" scope="col">Rejected</th>
                                        <th class="custom-border" scope="col">Reported</th>
                                        <th class="custom-border" scope="col">Completed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adverts as $key => $advert)
                                            @php
                                                $declared_vacancies = $advert->quarter1_vacancies + $advert->quarter2_vacancies + $advert->quarter3_vacancies + $advert->quarter4_vacancies;
                                                $number_of_applications = $advert->applications->count();
                                                $number_of_processed_applications = $advert->applications
                                                    ->where('status', '!=', 'pending')
                                                    ->count();
                                                $number_of_pending_applications = $advert->applications
                                                    ->where('status', 'pending')
                                                    ->count();
                                                $number_of_accepted_applications = $advert->applications
                                                    ->where('status', 'accepted')
                                                    ->count();
                                                $number_of_rejected_applications = $advert->applications
                                                    ->where('status', 'rejected')
                                                    ->count();
                                                $number_of_revoked_applications = $advert->applications
                                                    ->where(function ($query) {
                                                        $query->where('status', 'revoked');
                                                    })
                                                    ->count();
                                                $number_of_reported_applicants = $advert->attachees->count();
                                                $number_of_completed_applicants = $advert->attachees
                                                    ->where('status', 'completed')
                                                    ->count();
                                                
                                                $number_of_applicants_dismissed_before_completion = $advert->attachees
                                                    ->where('status', 'terminated_before_completion')
                                                    ->count();
                                                
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $advert->studyArea->title }}</td>
                                                <td>{{ $advert->department->name }}</td>
                                                <td>{{ $advert->year }}</td>
                                                <td>{{ $declared_vacancies }}</td>
                                                <td>{{ $number_of_applications }}</td>
                                                <td>{{ $number_of_processed_applications }}</td>
                                                <td>{{ $number_of_pending_applications }}</td>
                                                <td>{{ $number_of_accepted_applications }}</td>
                                                <td>{{ $number_of_revoked_applications }}</td>
                                                <td>{{ $number_of_rejected_applications }}</td>
                                                <td>{{ $number_of_reported_applicants }}</td>
                                                <td>{{ $number_of_completed_applicants }}</td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mb-5">
                                {{ $adverts->links() }}
                            </div>
                        </section>
                    </div>
                </section>
            </main>
            <x-footer />
        </div>

    </div>
</div>
