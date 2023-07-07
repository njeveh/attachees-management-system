<div>
    <x-slot:title>
        {{ __("Applicant's Application Documents") }}
    </x-slot:title>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-central-services-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content" class="pb-5">
                <div class="page-title">
                    <h3>{{ $application->advert->title }}/ Ref: {{ $application->advert->reference_number }}
                    </h3>
                </div>
                <div class="page-title">
                    <h3>Applicant's Name: {{ $application->applicant->first_name }}
                        {{ $application->applicant->second_name }}</h3>
                </div>
                <section class="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan='4' class="table-dark">
                                    <div class="d-flex justify-content-center align-items-center">
                                        Uploaded Application Documents
                                    </div>
                                </th>
                            <tr>
                            <tr>
                                <th>Document</th>
                                <th>Status</th>
                                <th>Review Remarks</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($application_accompaniments as $application_accompaniment)
                                <tr>
                                    <td>{{ ucwords(preg_replace('/_/', ' ', $application_accompaniment->name)) }}</td>
                                    <td>
                                        @switch($application_accompaniment->status)
                                            @case('pending_review')
                                                <span class="text-info">Pending review</span>
                                            @break

                                            @case('rejected')
                                                <span class="text-danger">Rejected</span>
                                            @break

                                            @case('accepted')
                                                <span class="text-success">Accepted</span>
                                            @break

                                            @default
                                                <span class="text-warning">Missing</span>
                                        @endswitch
                                    </td>
                                    <td>{{ $application_accompaniment->review_remarks }}</td>
                                    <td>
                                        <a href="{{ Storage::url($application_accompaniment->path) }}"
                                            class="btn btn-success">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </main>
            <x-footer />
        </div>
    </div>
</div>
