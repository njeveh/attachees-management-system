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
                        <button class="nav-link active bg-secondary text-light">Departments</button>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('central_services.dipca_users') }}" class="nav-link text-dark">Dipca</a>
                    </li>
                </ul>

                <x-loading-state-indicators />

                <div class="">
                    <input type="text" class="form-control my-2" wire:model="search" placeholder="Search">
                </div>
                <div class="d-flex flex-row align-items-center justify-content-end me-3">
                    <a href="{{ route('central_services.department-admin-registration-form') }}"
                        class="btn btn-success">Add
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
                            @if (count($department_users))
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($department_users as $department_user)
                                        <tr>
                                            <th scope="row" class="align-middle">{{ $i }}</th>
                                            <td class="align-middle">{{ $department_user->staff_id }}</td>
                                            <td class="align-middle">
                                                {{ $department_user->first_name }}
                                                {{ $department_user->last_name }}
                                            </td>
                                            <td class="align-middle">{{ $department_user->user->email }}</td>
                                            <td class="align-middle">{{ $department_user->phone_number }}</td>
                                            <td class="align-middle">
                                                @switch($department_user->user->is_active)
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
                                                        <li><a href="{{ route('central_services.reset_user_password', $department_user->user->id) }}"
                                                                class="dropdown-item" wire:click="">Reset
                                                                Password</a>
                                                        </li>
                                                        <li><button class="dropdown-item"
                                                                wire:click="toggleAccountActivation('{{ $department_user->user->id }}')">Activate/Deactivate</button>
                                                        </li>
                                                        <li><button class="dropdown-item"
                                                                wire:click="warn('delete', '{{ $department_user->user->id }}')">Delete</button>
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
                            {{ $department_users->links() }}
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
