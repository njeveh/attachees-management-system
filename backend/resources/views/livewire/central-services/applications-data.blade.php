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
                            {{-- <div class="col form-group">
                                <label for="cohort">Cohort:</label>
                                <select class="form-control" id="cohort" wire:model='cohort'>
                                    <option value="">All cohorts</option>
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
                                    @for ($year = date('Y'); $year > 2022; --$year)
                                        <option value="{{ $year }}/{{ $year + 1 }}">
                                            {{ $year }}/{{ $year + 1 }}</option>
                                    @endfor
                                </select>
                            </div>
                            <x-loading-state-indicators />
                        </div>
                        <table class="table table-sm table-responsive table-bordered my-2">
                            <thead>
                                <tr>
                                    <th class="custom-border" scope="col">Advert ref</th>
                                    <th class="custom-border" scope="col">Department</th>
                                    <th class="custom-border" scope="col">Year</th>
                                    <th class="custom-border" scope="col">Cohort</th>
                                    <th class="custom-border" scope="col">Declared vacancies</th>
                                    <th class="custom-border" scope="col">Number of Applications</th>
                                    <th class="custom-border" scope="col">Processed</th>
                                    <th class="custom-border" scope="col">Pending</th>
                                    <th class="custom-border" scope="col">Accepted</th>
                                    <th class="custom-border" scope="col">Revoked</th>
                                    <th class="custom-border" scope="col">Rejected</th>
                                    <th class="custom-border" scope="col">Reported</th>
                                    <th class="custom-border" scope="col">Completed</th>
                                </tr>
                            </thead>
                            @foreach ($adverts as $advert)
                                @for ($i = 1; $i < 5; ++$i)
                                    @php
                                        switch ($i) {
                                            case 1:
                                                $declared_vacancies = $advert->cohort1_vacancies;
                                                break;
                                            case 2:
                                                $declared_vacancies = $advert->cohort2_vacancies;
                                                break;
                                            case 3:
                                                $declared_vacancies = $advert->cohort3_vacancies;
                                                break;
                                            case 4:
                                                $declared_vacancies = $advert->cohort4_vacancies;
                                                break;
                                        }
                                        $number_of_applications = $advert->applications->where('quarter', $i)->count();
                                        $number_of_processed_applications = $advert->applications
                                            ->where('quarter', $i)
                                            ->where('status', '!=', 'pending')
                                            ->count();
                                        $number_of_pending_applications = $advert->applications
                                            ->where('quarter', $i)
                                            ->where('status', 'pending')
                                            ->count();
                                        $number_of_accepted_applications = $advert->applications
                                            ->where('quarter', $i)
                                            ->where('status', 'accepted')
                                            ->count();
                                        $number_of_rejected_applications = $advert->applications
                                            ->where('quarter', $i)
                                            ->where('status', 'rejected')
                                            ->count();
                                        $number_of_revoked_applications = $advert->applications
                                            ->where(function ($query) {
                                                $query->where('status', 'revoked');
                                            })
                                            ->count();
                                        $number_of_reported_applicants = $advert->attachees->where('cohort', $i)->count();
                                        $number_of_completed_applicants = $advert->attachees
                                            ->where('cohort', $i)
                                            ->where('status', 'completed')
                                            ->count();
                                        
                                        $number_of_applicants_dismissed_before_completion = $advert->attachees
                                            ->where('cohort', $i)
                                            ->where('status', 'terminated_before_completion')
                                            ->count();
                                        
                                    @endphp
                                    <tr>
                                        <td>{{ $advert->reference_number }}</td>
                                        <td>{{ $advert->department->name }}</td>
                                        <td>{{ $advert->year }}</td>
                                        <td>{{ $i }}</td>
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
                                @endfor
                            @endforeach
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </section>
            </main>
            <x-footer />
        </div>

    </div>
</div>
