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
                        <a href="{{ route('central_services.users') }}"
                            class="nav-link text-dark">Applicants/Attachees</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('central_services.departments_users') }}" class="text-dark">Departments</a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link nav-link active bg-secondary text-light">Dipca</button>
                    </li>
                </ul>

                <div class="my-2">
                    <input type="text" class="form-control" wire:model="search" placeholder="Search">
                </div>
                <div class="d-flex flex-row align-items-center justify-content-end me-3">
                    <a href="{{ route('central_services.dipca-admin-registration-form') }}" class="btn btn-success">Add
                        User
                    </a>
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
                                    <th scope="col">Staff ID.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Account Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @if (count($dipca_users))
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($dipca_users as $dipca_user)
                                        <tr>
                                            <th scope="row" class="align-middle">{{ $i }}</th>
                                            <td class="align-middle">{{ $dipca_user->staff_id }}</td>
                                            <td class="align-middle">
                                                {{ $dipca_user->first_name }}
                                                {{ $dipca_user->last_name }}
                                            </td>
                                            <td class="align-middle">{{ $dipca_user->user->email }}</td>
                                            <td class="align-middle">{{ $dipca_user->phone_number }}</td>
                                            <td class="align-middle">
                                                @switch($dipca_user->user->is_active)
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
                                                        <li><a href="{{ route('central_services.reset_user_password', $dipca_user->user->id) }}"
                                                                class="dropdown-item" wire:click="">Reset
                                                                Password</a>
                                                        </li>
                                                        <li><button class="dropdown-item"
                                                                wire:click="toggleAccountActivation('{{ $dipca_user->user->id }}')">Activate/Deactivate</button>
                                                        </li>
                                                        <li><button class="dropdown-item"
                                                                wire:click="warn('delete', '{{ $dipca_user->user->id }}')">Delete</button>
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
                                        <td colspan='5'>
                                            <h4>No results</h4>
                                        </td>
                                    </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="mb-5">
                            {{ $dipca_users->links() }}
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
