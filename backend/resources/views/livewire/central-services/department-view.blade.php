<div>
    <x-slot:title>
        {{ $department->name }} Details
    </x-slot:title>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-central-services-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div class="m-3">
                <form id="" class="needs-validation" wire:submit.prevent="updateDepartment">
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
                            class="form-control @error('department_phone') is-invalid @enderror" id="department-phone"
                            required>
                        @error('department_phone')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="department-email" class="form-label">Department Email</label>
                        <input type="email" wire:model="department_email"
                            class="form-control @error('department_email') is-invalid @enderror" id="department-email"
                            required>
                        @error('department_email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block form-control my-2">
                        Update
                    </button>
                </form>
            </div>
            <x-footer />
            <x-notification-modal>
                <x-slot:title>
                    {{ $feedback_header }}
                </x-slot:title>
                <x-slot:body class="{{ $alert_class }}">
                    {{ $feedback }}
                </x-slot:body>
            </x-notification-modal>
            <script>
                window.addEventListener('action_feedback', (event) => {
                    $("#notification-modal-btn").click();
                })
            </script>
        </div>
    </div>
</div>
