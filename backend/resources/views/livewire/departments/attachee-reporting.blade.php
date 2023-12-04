<div>
    <x-slot:title>
        {{ __('Attachee Reporting') }}
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
                        <h3>{{ $year }} Attachee reporting.
                        </h3>
                    </div>
                    {{-- Applications table --}}
                    <section class="overflow-auto">
                        <table class="table table-hover table-responsive-sm mb-5">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">No.</th>
                                    <th scope="col">ID. No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Study Area</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @if ($applications->count())
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($applications as $application)
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td class="align-middle">{{ $application->applicant->national_id }}</td>
                                            <td class="align-middle">
                                                {{ $application->applicant->first_name }}
                                                {{ $application->applicant->second_name }}</th>
                                            <td class="align-middle">
                                                {{ $application->advert->studyArea->title }}

                                            </td>

                                            <td>
                                                <button class="btn btn-success"
                                                    wire:click="report('{{ $application->id }}')">Report</button>
                                            </td>
                                        </tr>
                                        @php
                                            ++$i;
                                        @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan='5'>
                                            <h4>No admissible applicants.</h4>
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
