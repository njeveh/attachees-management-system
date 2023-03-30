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
                            class="nav-link">Application Documents</a>
                    </li>
                    <li class="nav-item">
                        <a href={{ route('departments.view_applicant_biodata', $application->id) }}
                            class="nav-link active bg-secondary text-light">Biodata</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link">Profile</button>
                    </li>
                </ul>
            </div>
            <main id="main-content" class="pb-5">

                <form class="mt-3" wire:submit.prevent="createUpdateBiodata">
                    <!-- Edit Advert -->
                    <div class="container">
                        <div class="form-group mb-3">
                            <label for="date-of-birth" class="form-label">{{ __('Date of Birth') }}</label>
                            <input type="date" wire:model="date_of_birth" class="form-control" id="date-of-birth"
                                disabled>
                        </div>

                        <div class="form-group mb-3">
                            <label for="address" class="form-label">{{ __('Address') }}</label>
                            <input type="text" wire:model="address" class="form-control" id="address" disabled>
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone-number" class="form-label">{{ __('Phone Number') }}</label>
                            <input type="text" wire:model="phone_number" class="form-control" id="phone-number"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="sex" class="form-label">
                                {{ __('Sex') }}</label>
                            <div id="sex">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" wire:model="sex" value="M"
                                            disabled>M
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" wire:model="sex" value="F"
                                            disabled>F
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="disability-field">
                            Has disability?
                        </div>
                        <div class="form-check">
                            <label for="has-disability" class="form-check-label">{{ __('No') }}</label>
                            <input type="radio" wire:model="has_disability" value='0' class="form-check-input"
                                id="has-disability" disabled>
                        </div>

                        <div class="form-check mb-2">
                            <label for="has-disability" class="form-check-label">{{ __('Yes') }}</label>
                            <input type="radio" wire:model="has_disability" value='1' class="form-check-input"
                                id="has-disability" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="disability" class="form-label">{{ __('Disability if Yes') }}</label>
                            <textarea wire:model="disability" class="form-control" id="disability" rows="3" disabled></textarea>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="level-of-study" class="form-label">Level of Study:</label>
                            <div id="level-of-study">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" wire:model="level_of_study"
                                            value="masters" disabled>Masters
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" wire:model="level_of_study"
                                            value="bachelors" disabled>Bachelors
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" wire:model="level_of_study"
                                            value="diploma" disabled>Diploma
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" wire:model="level_of_study"
                                            value="certificate" disabled>Certificate
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="course-of-study"
                                class="form-label">{{ __('Current Course of Study') }}</label>
                            <input type="text" wire:model="course_of_study" class="form-control"
                                id="course-of-study" disabled>
                        </div>
                        {{-- Emergency Contacts --}}
                        <div class="">
                            <h4>{{ __('Emergency Contacts') }}</h4>
                            <ol class="input-group-list">
                                @foreach ($emergency_contacts as $key => $emergency_contact)
                                    <li>
                                        <div class="mb-2 form-group">
                                            <label for="emergency_contact_{{ $key }}_name"
                                                class="form-lable">{{ __('Name') }}
                                            </label>
                                            <input type="text" class="form-control mb-3"
                                                id="emergency_contact_{{ $key }}_name"
                                                wire:model="emergency_contacts.{{ $key }}.name" disabled>
                                        </div>
                                        <div class="mb-2 form-group">
                                            <label for="emergency_contact_{{ $key }}_relationship"
                                                class="form-lable">{{ __('Relationship') }}
                                            </label>
                                            <input type="text" class="form-control mb-3"
                                                id="emergency_contact_{{ $key }}_relationship"
                                                wire:model="emergency_contacts.{{ $key }}.relationship"
                                                disabled>
                                        </div>
                                        <div class="mb-2 form-group">
                                            <label for="emergency_contact_{{ $key }}_phone_number"
                                                class="form-lable">{{ __('Phone Number') }}
                                            </label>
                                            <input type="text" class="form-control mb-3"
                                                id="emergency_contact_{{ $key }}_phone_number"
                                                wire:model.defer="emergency_contacts.{{ $key }}.phone_number"
                                                disabled>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                        {{-- Professional summary --}}
                        <div class="form-group mb-3">
                            <label for="professional-summary"
                                class="form-label">{{ __('Professional Summary') }}</label>
                            <textarea class="form-control" wire:model="professional_summary" id="professional-summary" rows="5" disabled></textarea>
                        </div>

                        {{-- Education --}}
                        <div class="">
                            <h4>{{ __('Education') }}</h4>
                            <ol class='input-group-list'>
                                @foreach ($education_levels as $key => $education_level)
                                    <li>
                                        <div class="mb-2 form-group">
                                            <label for="education_levels_{{ $key }}_level"
                                                class="form-lable">{{ __('Level of Education') }}
                                            </label>
                                            <input type="text" class="form-control mb-3"
                                                id="education_levels_{{ $key }}_level"
                                                wire:model.defer="education_levels.{{ $key }}.education_level"
                                                disabled>
                                        </div>
                                        <div class="mb-2 form-group">
                                            <label for="education_levels_{{ $key }}_start_date"
                                                class="form-lable">{{ __('Start Date') }}
                                            </label>
                                            <input type="date" class="form-control mb-3"
                                                id="education_levels_{{ $key }}_start_date"
                                                wire:model.defer="education_levels.{{ $key }}.start_date"
                                                disabled>
                                        </div>
                                        <div class="mb-2 form-group">
                                            <label for="education_levels_{{ $key }}_end_date"
                                                class="form-lable">{{ __('End Date') }}
                                            </label>
                                            <input type="date" class="form-control mb-3"
                                                id="education_levels_{{ $key }}_end_date"
                                                wire:model.defer="education_levels.{{ $key }}.end_date"
                                                disabled>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </div>

                        {{-- Skills --}}
                        <div class="">
                            <h4>{{ __('Skills') }}</h4>
                            <ol class='input-group-list'>
                                @foreach ($skills as $key => $skill)
                                    <li>
                                        <div class="mb-2 form-group">
                                            <label for="skills_{{ $key }}_skill"
                                                class="form-lable">{{ __('Skills') }}
                                            </label>
                                            <textarea type="text" class="form-control mb-3" id="skills_{{ $key }}_skill"
                                                wire:model.defer="skills.{{ $key }}.skill" disabled></textarea>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </div>

                        {{-- Referees --}}
                        <div class="">
                            <h4>{{ __('Referees') }}</h4>
                            <ol class='input-group-list'>
                                @foreach ($referees as $key => $referee)
                                    <li>
                                        <div class="mb-2 form-group">
                                            <label for="referee_{{ $key }}_name"
                                                class="form-lable">{{ __('Name') }}
                                            </label>
                                            <input type="text" class="form-control mb-3"
                                                id="referee_{{ $key }}_name"
                                                wire:model.defer="referees.{{ $key }}.name" disabled>
                                        </div>
                                        <div class="mb-2 form-group">
                                            <label for="referee_{{ $key }}_relationship"
                                                class="form-lable">{{ __('Relationship') }}
                                            </label>
                                            <input type="text" class="form-control mb-3"
                                                id="referee_{{ $key }}_relationship"
                                                wire:model.defer="referees.{{ $key }}.relationship" disabled>
                                        </div>
                                        <div class="mb-2 form-group">
                                            <label for="referee_{{ $key }}_phone_number"
                                                class="form-lable">{{ __('Phone Number') }}
                                            </label>
                                            <input type="text" class="form-control mb-3"
                                                id="referee_{{ $key }}_phone_number"
                                                wire:model.defer="referees.{{ $key }}.phone_number" disabled>

                                        </div>
                                        <div class="mb-2 form-group">
                                            <label for="referee_{{ $key }}_email"
                                                class="form-lable">{{ __('Email') }}
                                            </label>
                                            <input type="email" class="form-control mb-3"
                                                id="referee_{{ $key }}_email"
                                                wire:model.defer="referees.{{ $key }}.email" disabled>
                                        </div>
                                        <div class="mb-2 form-group">
                                            <label for="referee_{{ $key }}_institution"
                                                class="form-lable">{{ __('Institution') }}
                                            </label>
                                            <input type="text" class="form-control mb-3"
                                                id="referee_{{ $key }}_institution"
                                                wire:model.defer="referees.{{ $key }}.institution" disabled>
                                        </div>
                                        <div class="mb-2 form-group">
                                            <label for="referee_{{ $key }}_posititon"
                                                class="form-lable">{{ __('Posititon in the Institution') }}
                                            </label>
                                            <input type="text" class="form-control mb-3"
                                                id="referee_{{ $key }}_posititon"
                                                wire:model.defer="referees.{{ $key }}.position" disabled>
                                        </div>

                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </form>
            </main>
            <x-footer />
        </div>
    </div>
</div>
