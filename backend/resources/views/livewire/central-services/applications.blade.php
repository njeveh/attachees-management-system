<div>
    <x-slot:title>
        Applications
    </x-slot:title>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-central-services-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div class="fixed-filters bg-light">
                <x-loading-state-indicators />

                <div class="row">
                    <div class="col form-group mb-1">
                        <label for="cohort">Cohort:</label>
                        <select class="form-select" id="cohort" wire:model='cohort'>
                        <option value="">All Cohorts</option>
                            <option value="1">Cohort 1</option>
                            <option value="2">Cohort 2</option>
                            <option value="3">Cohort 3</option>
                            <option value="4">Cohort 4</option>
                        </select>
                    </div>
                    <div class="col form-group mb-1">
                        <label for="year">Year:</label>
                        <select class="form-select" id="year" wire:model="year">
                            <option value="">All Years</option>
                            @for ($option_year = date('Y'); $option_year > 2021; --$option_year)
                                <option value="{{ $option_year }}/{{ $option_year + 1 }}">
                                    {{ $option_year }}/{{ $option_year + 1 }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col form-group mb-1">
                        <label for="department">Department:</label>
                        <select class="form-select" id="department" wire:model='department'>
                            <option value="">All departments</option>
                            @foreach ($departments as $option_department)
                                <option value="{{ $option_department->id }}">{{ $option_department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <select class="form-select" id="status-select" wire:model="status_filter">
                            <option value="">
                                All Statuses
                            </option>
                            <option value="pending">
                                Pending
                            </option>
                            <option value="accepted">
                                Accepted
                            </option>
                            <option value="rejected">
                                Rejected
                            </option>
                            <option value="canceled">
                                canceled
                            </option>
                            <option value="revoked">
                                revoked
                            </option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" wire:model="search" placeholder="Search">
                    </div>
                </div>
            </div>
            <div id="main-content" class="tab">
                <main>
                    {{-- Applications table --}}
                    <section class="overflow-auto">
                        <table class="table table-hover table-responsive-sm mb-5">
                            <thead>
                                <tr class="">
                                    <th colspan='6'>
                                        <div class="d-flex align-content-center justify-content-end">
                                            <div>
                                                <button class="btn btn-secondary" wire:click="resetAllFilters()">Reset
                                                    Filters</button>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                <tr class="bg-dark text-light">
                                    <th scope="col">No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @if (count($applications))
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($applications as $application)
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td class="align-middle">
                                                {{ $application->applicant->first_name }}
                                                {{ $application->applicant->second_name }}</th>
                                            <td class="align-middle">{{ $application->advert->title }}</td>
                                            <td class="align-middle">{{ $application->advert->department->name }}</td>
                                            <td class="align-middle">
                                                @switch($application->status)
                                                    @case('pending')
                                                        <span class="text-info">Pending</span>
                                                    @break

                                                    @case('rejected')
                                                        <span class="text-danger">Rejected</span>
                                                    @break

                                                    @case('accepted')
                                                        <span class="text-success">Accepted</span>
                                                    @break

                                                    @case('revoked')
                                                        <span class="text-danger">Acceptance Revoked</span>
                                                    @break

                                                    @case('canceled')
                                                        <span class="text-warning">Canceled</span>
                                                    @break
                                                @endswitch

                                            </td>

                                            <td>
                                                <a href={{ route('central_services.view_application_documents', $application->id) }}
                                                    class="btn btn-success">View Application</a>
                                            </td>
                                        </tr>
                                        @php
                                            ++$i;
                                        @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan='6'>
                                            <h4>No results</h4>
                                        </td>
                                    </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="mb-5">
                            {{ $applications->links() }}
                        </div>
                    </section>
                </main>
                <x-footer />
            </div>
        </div>
    </div>
</div>
