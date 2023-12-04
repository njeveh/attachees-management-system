<div>
    <x-slot:title>
        {{ auth()->user()->departmentAdmin->department->name }} {{ __('Applications') }}
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
                            class="nav-link">Application Documents</a>
                    </li>
                    <li class="nav-item">
                        <a href={{ route('departments.view_applicant_biodata', $application->id) }}
                            class="nav-link">Biodata</a>
                    </li>
                    <li class="nav-item">
                        <a href={{ route('departments.view_applicant_profile', $application->id) }}
                            class="nav-link active bg-secondary text-light">Profile</a>
                    </li>
                </ul>
            </div>
            <main id="main-content" class="pb-5">
                <form>
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nationalId">{{ __('National ID Number') }}</label>
                        <input type="text" class="form-control" wire:model='national_id' disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="firstName">{{ __('First Name') }}</label>
                        <input id="firstName" type="text" class="form-control" wire:model='first_name' disabled>
                    </div>
                    <div class="form-group mb-3">
                        <label for="secondName">{{ __('Second Name') }}</label>
                        <input id="secondName" type="text" class="form-control" wire:model='second_name' disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">{{ __('Email Address') }}</label>

                        <input id="email" type="email" class="form-control" wire:model='email' disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label for="phoneNumber">{{ __('Phone Number') }}</label>
                        <input id="phoneNumber" type="text" class="form-control" wire:model='phone_number' disabled>
                    </div>

                    <div class="form-group mb-3">
                        <label for="institution">{{ __('Institution') }}</label>

                        <input id="institution" type="text" class="form-control" wire:model='institution' disabled>
                    </div>
                </form>
            </main>
            <x-footer />
        </div>
    </div>
</div>
