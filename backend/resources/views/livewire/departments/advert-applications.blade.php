<div>
    <x-slot:title>
        Advert Applications
    </x-slot:title>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-department-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div class="fixed-filters bg-light">

                <x-loading-state-indicators />

                <div class="row">
                    <div class="col">
                        <select class="form-select" id="status-select" wire:model="status_filter">
                            <option value="">
                                All
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
                    <div class="page-title">
                        <h5>Applications for Advert : {{ $advert->studyArea->title . ' /Ref: ' . $advert->reference_number }}
                        </h5>
                    </div>
                    {{-- Applications table --}}
                    <section class="overflow-auto">
                        <table class="table table-hover table-responsive-sm mb-5">
                            <thead>
                                <tr class="{{ $table_title_bg_color }}">
                                    <th colspan='5'>
                                        <div class="d-flex align-content-center justify-content-between">
                                            <h5>{{ $table_title }}</h5>
                                            <div>
                                                <button class="btn btn-secondary" wire:click="resetAllFilters()">Default
                                                    Filters</button>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                                <tr class="bg-dark text-light">
                                    <th scope="col">No.</th>
                                    <th scope="col">Name</th>
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
                                                <div class="btn-group btn-group-md">
                                                    <a href={{ route('departments.view_application_details', $application->id) }}
                                                        class="btn btn-success">View</a>
                                                    @if ($application->status == 'pending')
                                                        <button class="btn btn-primary"
                                                            wire:click="warn('accept', '{{ $application->id }}')">
                                                            Accept
                                                        </button>
                                                        <button wire:click="warn('reject', '{{ $application->id }}')"
                                                            class="btn btn-danger">
                                                            Reject
                                                        </button>
                                                    @endif
                                                    @if ($application->status == 'accepted')
                                                        <button class="btn btn-danger" data-bs-toggle="collapse"
                                                            data-bs-target="#revocation-form-{{ $application->id }}">Revoke</button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @if ($application->status == 'accepted')
                                            <tr class="m-0 p-0">
                                                <td colspan='5' class="m-0 p-0">
                                                    <form>
                                                        <div wire:ignore.self
                                                            class="form-group mb-3 collapse bg-dark text-light p-2"
                                                            id="revocation-form-{{ $application->id }}">
                                                            <label for="{{ $application->id }}"
                                                                class="form-label">Please give
                                                                reason(s) for revocation.</label>

                                                            <textarea type="text" wire:model="revocation_reasons" class="form-control" id="{{ $application->id }}" required></textarea>
                                                            @error('revocation_reasons')
                                                                <span class="alert alert-danger">
                                                                    {{ $message }}
                                                                </span>
                                                            @enderror
                                                            <button type="button"
                                                                wire:click="revokeApplicationAcceptance('{{ $application->id }}')"
                                                                class="btn btn-info btn-block form-control my-2">
                                                                Proceed
                                                            </button>
                                                            <button type="button"
                                                                class="btn btn-outline-danger btn-block form-control my-2"
                                                                data-bs-toggle="collapse" aria-expanded="false"
                                                                data-bs-target="#revocation-form-{{ $application->id }}">
                                                                Cancel/Close
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                        @php
                                            ++$i;
                                        @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan='5'>
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
</div>
