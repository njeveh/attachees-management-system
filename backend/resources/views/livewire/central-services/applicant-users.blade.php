<div>
    <x-slot:title>
        Users
    </x-slot:title>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-central-services-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div class="fixed-filters bg-light">
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <button type="button"
                            class="nav-link active bg-secondary text-light">Applicants/Attachees</button>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('central_services.departments_users') }}"
                            class="nav-link text-dark">Departments</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('central_services.dipca_users') }}" class="nav-link text-dark">Dipca</a>
                    </li>
                </ul>

                <x-loading-state-indicators />

                <div class="row">
                    <div class="col">
                        <select class="form-select" id="status-select" wire:model="status_filter">
                            <option value="">
                                All
                            </option>
                            <option value="applicants">
                                Applicants
                            </option>
                            <option value="active_attachees">
                                Active Attachees
                            </option>
                            <option value="dismissed_attachees">
                                Dismissed Attachees
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
                    {{-- Attachees table --}}
                    <section class="overflow-auto">
                        <table class="table table-hover table-responsive-sm mb-5 mt-3">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">No.</th>
                                    <th scope="col">ID. No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Account Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @if (count($applicants))
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($applicants as $applicant)
                                        <tr>
                                            <th scope="row" class="align-middle">{{ $i }}</th>
                                            <td class="align-middle">{{ $applicant->national_id }}</td>
                                            <td class="align-middle">
                                                {{ $applicant->first_name }}
                                                {{ $applicant->second_name }}
                                            </td>
                                            <td class="align-middle">{{ $applicant->user->email }}</td>
                                            <td class="align-middle">{{ $applicant->phone_number }}</td>
                                            <td class="align-middle">
                                                @switch($applicant->user->is_active)
                                                    @case(0)
                                                        <span class="text-danger">Inactive</span>
                                                    @break

                                                    @case(1)
                                                        <span class="text-success">Active</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            <td class="align-middle">
                                                <div class="dropdown dropstart">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-bs-toggle="dropdown">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        {{-- <li><a class="dropdown-item" href="#">View Profile</a>
                                                        </li> --}}
                                                        <li><a href="{{ route('central_services.reset_user_password', $applicant->user->id) }}"
                                                                class="dropdown-item" wire:click="">Reset
                                                                Password</a>
                                                        </li>
                                                        <li><button class="dropdown-item"
                                                                wire:click="toggleAccountActivation('{{ $applicant->user->id }}')">Activate/Deactivate</button>
                                                        </li>
                                                        <li><button class="dropdown-item"
                                                                wire:click="warn('delete', '{{ $applicant->user->id }}')">Delete</button>
                                                        </li>
                                                    </ul>
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
                                            <h4>No results</h4>
                                        </td>
                                    </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="mb-5">
                            {{ $applicants->links() }}
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
