<div>
    <x-slot:title>
        {{ __("Applicant's Application Documents") }}
    </x-slot:title>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-department-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div class="fixed-filters bg-light">
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a href={{ route('departments.view_application_details', $application->id) }}
                            class="nav-link active bg-secondary text-light">Application Documents</a>
                    </li>
                    <li class="nav-item">
                        <a href={{ route('departments.view_applicant_biodata', $application->id) }}
                            class="nav-link">Biodata</a>
                    </li>
                    <li class="nav-item">
                         <a href={{ route('departments.view_applicant_profile', $application->id) }}
                            class="nav-link">Profile</a>
                    </li>
                </ul>
            <div id="sticky-btns-department-view-application-docs"
                class="d-flex align-items-center justify-content-between p-3">

                @switch($application->status)
                    @case('pending')
                        <div class="d-flex align-items-center justify-content-start">Application Status :&nbsp;
                            <span class="text-info">Pending</span>
                        </div>
                        <div class="d-flex flex-wrap justify-content-end">
                            <button class="btn btn-primary m-2" wire:click="warn('accept', '{{ $application->id }}')">
                                Accept
                            </button>
                            <button wire:click="warn('reject', '{{ $application->id }}')"
                                class="btn btn-danger m-2">Reject</button>
                        </div>
                    @break

                    @case('rejected')
                        <div class="d-flex align-items-center justify-content-start">Application Status :&nbsp;
                            <span class="text-danger">Rejected</span>
                        </div>
                        <div class="d-flex flex-wrap justify-content-end">
                            {{-- <button class="btn btn-danger m-2">Undo Reject</button> --}}
                        </div>
                    @break

                    @case('accepted')
                        <div class="d-flex align-items-center justify-content-start">Application Status :&nbsp;
                            <span class="text-success">Accepted</span>
                        </div>
                        <div class="d-flex flex-wrap justify-content-end">
                            <button class="btn btn-danger m-2" data-bs-toggle="collapse"
                                data-bs-target="#revocation-form-{{ $application->id }}">Revoke</button>
                        </div>
                    @break

                    @case('revoked')
                        <div class="d-flex align-items-center justify-content-start">Application Status :&nbsp;
                            <span class="text-danger">Acceptance Revoked</span>
                        </div>
                        {{-- <div class="d-flex flex-wrap justify-content-end">
                            <button class="btn btn-primary m-2">Undo Revoke</button>
                        </div> --}}
                    @break

                    @case('canceled')
                        <div class="d-flex align-items-center justify-content-start">Application Status :&nbsp;
                            <span class="text-warning">canceled</span>
                        </div>
                    @break
                @endswitch
            </div>
            </div>
            <form>
                <div wire:ignore.self class="form-group mb-3 collapse bg-dark text-light p-2"
                    id="revocation-form-{{ $application->id }}">
                    <label for="{{ $application->id }}" class="form-label">Please give
                        reason(s) for revocation.</label>

                    <textarea type="text" wire:model="revocation_reasons" class="form-control" id="{{ $application->id }}" required></textarea>
                    @error('revocation_reasons')
                        <span class="alert alert-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    <button type="button" wire:click="revokeApplicationAcceptance('{{ $application->id }}')"
                        class="btn btn-info btn-block form-control my-2">
                        Proceed
                    </button>
                    <button type="button" class="btn btn-outline-danger btn-block form-control my-2"
                        data-bs-toggle="collapse" aria-expanded="false"
                        data-bs-target="#revocation-form-{{ $application->id }}">
                        Cancel/Close
                    </button>
                </div>
            </form>
            <main id="main-content" class="pb-5">
                <div class="page-title">
                    <h3>{{ $application->advert->studyArea->title }}/ Ref: {{ $application->advert->reference_number }}
                    </h3>
                </div>
                <div class="page-title">
                    <h3>Applicant's Name: {{ $application->applicant->first_name }}
                        {{ $application->applicant->second_name }}</h3>
                    <div>Prefered starting date: {{ $application->desired_start_date }}</div>
                    <div>Application expiry date: {{ $application->expiry_date }}</div>
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
                                        <div class="btn-group btn-group-sm">
                                            @switch($application_accompaniment->status)
                                                @case('pending_review')
                                                    <button wire:click="setIntendedStatus('accepted', 'Accept')"
                                                        class="btn btn-primary activate-form-btn" data-bs-toggle="collapse"
                                                        data-bs-target="#action-form-{{ $application_accompaniment->id }}">Accept</button>
                                                    <button wire:click="setIntendedStatus('rejected', 'Reject')"
                                                        class="btn btn-danger activate-form-btn" data-bs-toggle="collapse"
                                                        data-bs-target="#action-form-{{ $application_accompaniment->id }}">Reject</button>
                                                @break

                                                @case('rejected')
                                                    <button wire:click="setIntendedStatus('accepted', 'Accept')"
                                                        class="btn btn-primary activate-form-btn" data-bs-toggle="collapse"
                                                        data-bs-target="#action-form-{{ $application_accompaniment->id }}">Accept</button>
                                                @break

                                                @case('accepted')
                                                    <button wire:click="setIntendedStatus('rejected', 'Reject')"
                                                        class="btn btn-danger activate-form-btn" data-bs-toggle="collapse"
                                                        data-bs-target="#action-form-{{ $application_accompaniment->id }}">
                                                        Reject
                                                    </button>
                                                @break
                                            @endswitch
                                            <a href="{{ Storage::url($application_accompaniment->path) }}"
                                                class="btn btn-success">View</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="m-0 p-0">
                                    <td colspan='4' class="m-0 p-0">
                                        <form wire:submit.prevent="update('{{ $application_accompaniment->name }}')">
                                            <div wire:ignore.self
                                                class="form-group mb-3 collapse bg-dark text-light p-2"
                                                id="action-form-{{ $application_accompaniment->id }}">
                                                <label for="{{ $application_accompaniment->id }}"
                                                    class="form-label">Mind leaving a review remark? (you may leave
                                                    input
                                                    field as blank and proceed)</label>

                                                <input type="text" wire:model="review_remarks" class="form-control"
                                                    id="{{ $application_accompaniment->id }}">
                                                <button type="button"
                                                    wire:click="act('{{ $application_accompaniment->name }}')"
                                                    class="btn btn-info btn-block form-control my-2">
                                                    Proceed to {{ $intended_action }}
                                                </button>
                                                <button type="button"
                                                    class="btn btn-outline-danger btn-block form-control my-2"
                                                    data-bs-toggle="collapse" aria-expanded="false"
                                                    data-bs-target="#action-form-{{ $application_accompaniment->id }}">
                                                    Cancel/Close
                                                </button>
                                            </div>
                                        </form>
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
    <x-prompt-modal>
        <x-slot:title>
            {{ $feedback_header }}
        </x-slot:title>
        <x-slot:body class="{{ $alert_class }}">
            {{ $feedback }}
        </x-slot:body>
        <x-slot:confirm_btn>
            <button wire:click="$emit('{{ $confirmed_action }}', '{{ $confirmed_action_parameter }}')"
                type="button" data-bs-dismiss="modal" data-bs-target="#promptModal"
                class="btn btn-danger">Yes</button>
        </x-slot:confirm_btn>
    </x-prompt-modal>

    <x-notification-modal>
        <x-slot:title>
            {{ $feedback_header }}
        </x-slot:title>
        <x-slot:body class="{{ $alert_class }}">
            {{ $feedback }}
        </x-slot:body>
    </x-notification-modal>

    <script>
        window.addEventListener('action_confirm', (event) => {
            $("#prompt-modal-btn").click();
        })
        window.addEventListener('action_feedback', (event) => {
            $("#notification-modal-btn").click();
        })
    </script>
</div>
