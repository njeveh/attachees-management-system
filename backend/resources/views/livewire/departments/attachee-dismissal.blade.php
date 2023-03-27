<div>
    <x-slot:title>
        {{ __('Attachee Dismissing') }}
    </x-slot:title>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-department-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div class="fixed-filters bg-light">

                <x-loading-state-indicators />

                <div class="m-3">
                    <input type="text" class="form-control" wire:model="search" placeholder="Search">
                </div>
            </div>
            <div id="main-content" class="tab">
                <main>
                    <div class="page-title">
                        <h3>Attachee Dismissing.
                        </h3>
                    </div>
                    <section class="overflow-auto">
                        <table class="table table-hover table-responsive-sm mb-5">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">No.</th>
                                    <th scope="col">ID. No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Cohort</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @if ($attachees->count())
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($attachees as $attachee)
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $attachee->national_id }}</td>
                                            <td class="align-middle">
                                                {{ $attachee->first_name }}
                                                {{ $attachee->second_name }}</th>
                                            <td>{{ $attachee->year }}</td>
                                            <td>{{ $attachee->cohort }}</td>
                                            <td class="align-middle">
                                                {{ $attachee->position }}

                                            </td>

                                            <td>
                                                <button class="btn btn-warning" data-bs-toggle="collapse"
                                                    data-bs-target="#termination-reason-{{ $attachee->id }}">Dismiss</button>
                                            </td>
                                        </tr>
                                        <tr class="m-0 p-0">
                                            <td colspan='7' class="m-0 p-0">
                                                <div wire:ignore.self
                                                    class="form-group mb-3 collapse bg-dark text-light p-2"
                                                    id="termination-reason-{{ $attachee->id }}">
                                                    <div>Please
                                                        select a
                                                        dismissal reason.</div>

                                                    <div class="row">
                                                        <button class="col btn btn-success m-2"
                                                            wire:click="warn('{{ $attachee->id }}', 'completed')">Completed</button>
                                                        <button class="col btn btn-warning m-2"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#reason-input-form-{{ $attachee->id }}">Other</button>
                                                    </div>
                                                    <form id="reason-input-form-{{ $attachee->id }}" class="collapse"
                                                        wire:ignore.self>
                                                        <label for="{{ $attachee->id }}" class="form-label">Please
                                                            enter the
                                                            dismissal reason(s).</label>
                                                        <textarea type="text" wire:model="termination_reason" class="form-control" id="{{ $attachee->id }}" required></textarea>
                                                        @error('termination_reason')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                        <button type="button"
                                                            wire:click="warn('{{ $attachee->id }}', 'other')"
                                                            class="btn btn-info btn-block form-control my-2">
                                                            Proceed
                                                        </button>
                                                    </form>
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-block form-control my-2"
                                                        data-bs-toggle="collapse" aria-expanded="false"
                                                        data-bs-target="#termination-reason-{{ $attachee->id }}, #reason-input-form-{{ $attachee->id }}">
                                                        Cancel/Close
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            ++$i;
                                        @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan='7'>
                                            <h4>No dismissible attachees.</h4>
                                        </td>
                                    </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="mb-5">
                            {{-- {{ $approved_applications->links() }} --}}
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
                <button wire:click="dismiss('{{ $confirmed_action_parameter }}')" type="button"
                    data-bs-dismiss="modal" data-bs-target="#promptModal" class="btn btn-danger">Yes</button>
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
