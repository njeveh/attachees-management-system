<div>
    <x-slot:title>
        {{ __('Departments') }}
    </x-slot:title>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-central-services-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div class="fixed-filters bg-light">

                <x-loading-state-indicators />

                <div class="mt-4 mx-3 mb-2">
                    <input type="text" class="form-control" wire:model="search" placeholder="Search">
                </div>
                <div class="d-flex flex-row align-items-center justify-content-end me-3">
                    <button class="btn btn-primary" data-bs-target="#add-department-form" data-bs-toggle="collapse">Add
                        New
                    </button>
                </div>
                <div wire:ignore.self class="form-group mb-3 mt-4 collapse bg-dark text-light p-2"
                    id="add-department-form">
                    <div class="d-flex align-items-center justify-content-end m-2">
                        <button class="btn btn-close bg-light" data-bs-target="#add-department-form"
                            data-bs-toggle="collapse"></button>
                    </div>
                    <form id="" class="needs-validation" wire:submit.prevent="addDepartment">
                        <div class="form-group">
                            <label for="department-name" class="form-label">Name</label>
                            <input type="text" wire:model="department_name"
                                class="form-control @error('department_name') is-invalid @enderror" id="department-name"
                                required>
                            @error('department_name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="department-description" class="form-label">Description</label>
                            <textarea rows="10" wire:model="department_description"
                                class="form-control @error('department_description') is-invalid @enderror" id="department-description"></textarea>
                            @error('department_description')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="department-head" class="form-label">Department Head</label>
                            <input type="text" wire:model="department_head"
                                class="form-control @error('department_head') is-invalid @enderror" id="department-head"
                                required>
                            @error('department_head')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="department-phone" class="form-label">Department Phone</label>
                            <input type="text" wire:model="department_phone"
                                class="form-control @error('department_phone') is-invalid @enderror"
                                id="department-phone" required>
                            @error('department_phone')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="department-email" class="form-label">Department Email</label>
                            <input type="email" wire:model="department_email"
                                class="form-control @error('department_email') is-invalid @enderror"
                                id="department-email" required>
                            @error('department_email')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-info btn-block form-control my-2">
                            Submit
                        </button>
                    </form>
                    <button type="button" class="btn btn-outline-danger btn-block form-control my-2"
                        data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#add-department-form">
                        Cancel/Close
                    </button>
                </div>
            </div>
            <div id="main-content" class="tab">
                <main>
                    <div class="page-title">
                        <h3>Departments
                        </h3>
                    </div>
                    <section class="overflow-auto">
                        <table class="table table-hover table-responsive-sm mb-5">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">No.</th>
                                    <th scope="col">Dept. Name</th>
                                    <th scope="col">Dept. Head</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @if ($departments->count())
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($departments as $department)
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $department->name }}</td>
                                            <td class="align-middle">
                                                {{ $department->department_head }}
                                            <td>{{ $department->phone }}</td>
                                            <td>
                                                <a href="{{ route('central_services.department_view', $department->id) }}"
                                                    class="btn btn-success m-2">Details</a>
                                                <button class="btn btn-danger m-2"
                                                    wire:click="warn('{{ $department->id }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @php
                                            ++$i;
                                        @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan='5'>
                                            <h4>No departments to show.</h4>
                                        </td>
                                    </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="mb-5">
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
                <button wire:click="delete('{{ $confirmed_action_target }}')" type="button" data-bs-dismiss="modal"
                    data-bs-target="#promptModal" class="btn btn-danger">Yes</button>
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
