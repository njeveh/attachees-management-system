<div>

    <form class="mt-3" wire:submit.prevent="createUpdateBiodata">
        @csrf
        <!-- Edit Advert -->
        <div class="container">
            <div class="form-group mb-3">
                <label for="date-of-birth" class="form-label">{{ __('Date of Birth') }}</label>
                <input type="date" wire:model="date_of_birth" class="form-control" id="date-of-birth">
                @error('date_of_birth')
                    <span class="error">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="address" class="form-label">{{ __('Address') }}</label>
                <input type="text" wire:model="address" class="form-control" id="address" required>
                @error('address')
                    <span class="error">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="phone-number" class="form-label">{{ __('Phone Number') }}</label>
                <input type="text" wire:model="phone_number" class="form-control" id="phone-number" required>
                @error('phone_number')
                    <span class="error">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <p class="disability-field">
                Do you have any disability?
            </p>
            <div class="form-check">
                <label for="has-disability" class="form-check-label">{{ __('No') }}</label>
                <input type="radio" wire:model="has_disability" value='0' class="form-check-input"
                    id="has-disability">
            </div>

            <div class="form-check mb-2">
                <label for="has-disability" class="form-check-label">{{ __('Yes') }}</label>
                <input type="radio" wire:model="has_disability" value='1' class="form-check-input"
                    id="has-disability">
                @error('has_disability')
                    <span class="error">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="disability-field">
                Please specify your disability
                below
            </div>
            <div class="form-group mb-3">
                <label for="disability" class="form-label">{{ __('Disability') }}</label>
                <textarea wire:model="disability" class="form-control" id="disability" rows="3"></textarea>
                @error('disability')
                    <span class="error">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Emergency Contacts --}}
            <div class="">
                <h4>{{ __('Emergency Contacts') }}</h4>
                <ol>
                    @foreach ($emergency_contacts as $key => $emergency_contact)
                        @if ($key > 0)
                            <li>
                                <div class="mb-2 form-group">
                                    <label for="emergency_contact_{{ $key }}_name"
                                        class="form-lable">{{ __('Name') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="emergency_contact_{{ $key }}_name"
                                        wire:model.defer="emergency_contacts.{{ $key }}.name" required>
                                    @error('emergency_contacts.' . $key . '.name')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="emergency_contact_{{ $key }}_relationship"
                                        class="form-lable">{{ __('Relationship') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="emergency_contact_{{ $key }}_relationship"
                                        wire:model.defer="emergency_contacts.{{ $key }}.relationship"
                                        required>
                                    @error('emergency_contacts.' . $key . '.relationship')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="emergency_contact_{{ $key }}_phone_number"
                                        class="form-lable">{{ __('Phone Number') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="emergency_contact_{{ $key }}_phone_number"
                                        wire:model.defer="emergency_contacts.{{ $key }}.phone_number"
                                        required>
                                    @error('emergency_contacts.' . $key . '.phone_number')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-outline-danger btn-block form-control"
                                    wire:click="removeInput({{ $key }},'emergency_contact')">
                                    <span><i class="fas fa-times"></i></span>
                                </button>
                            </li>
                        @else
                            <li>
                                <div class="mb-2 form-group">
                                    <label for="emergency_contact_{{ $key }}_name"
                                        class="form-lable">{{ __('Name') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="emergency_contact_{{ $key }}_name"
                                        wire:model.defer="emergency_contacts.{{ $key }}.name" required>
                                    @error('emergency_contacts.' . $key . '.name')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="emergency_contact_{{ $key }}_relationship"
                                        class="form-lable">{{ __('Relationship') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="emergency_contact_{{ $key }}_relationship"
                                        wire:model.defer="emergency_contacts.{{ $key }}.relationship"
                                        required>
                                    @error('emergency_contacts.' . $key . '.relationship')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="emergency_contact_{{ $key }}_phone_number"
                                        class="form-lable">{{ __('Phone Number') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="emergency_contact_{{ $key }}_phone_number"
                                        wire:model.defer="emergency_contacts.{{ $key }}.phone_number"
                                        required>
                                    @error('emergency_contacts.' . $key . '.phone_number')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ol>
                <div class="container  d-flex justify-content-end align-content-center  mb-3">
                    <button class="btn btn-success" wire:click="addInput('emergency_contact')"type="button">
                        {{ __('Add emergency Contact') }}
                    </button>
                </div>
            </div>
            {{-- Professional summary --}}
            <div class="form-group mb-3">
                <label for="professional-summary" class="form-label">{{ __('Professional Summary') }}</label>
                <textarea class="form-control" wire:model="professional_summary" id="professional-summary" rows="5" required></textarea>
                @error('professional_summary')
                    <span class="error">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Education --}}
            <div class="">
                <h4>{{ __('Education') }}</h4>
                <ol>
                    @foreach ($education_levels as $key => $education_level)
                        @if ($key > 0)
                            <li>
                                <div class="mb-2 form-group">
                                    <label for="education_levels_{{ $key }}_level"
                                        class="form-lable">{{ __('Level of Education') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="education_levels_{{ $key }}_level"
                                        wire:model.defer="education_levels.{{ $key }}.education_level"
                                        required>
                                    @error('education_levels.' . $key . '.education_level')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="education_levels_{{ $key }}_start_date"
                                        class="form-lable">{{ __('Start Date') }}
                                    </label>
                                    <input type="date" class="form-control mb-3"
                                        id="education_levels_{{ $key }}_start_date"
                                        wire:model.defer="education_levels.{{ $key }}.start_date" required>
                                    @error('education_levels.' . $key . '.start_date')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="education_levels_{{ $key }}_end_date"
                                        class="form-lable">{{ __('End Date') }}
                                    </label>
                                    <input type="date" class="form-control mb-3"
                                        id="education_levels_{{ $key }}_end_date"
                                        wire:model.defer="education_levels.{{ $key }}.end_date" required>
                                    @error('education_levels.' . $key . '.end_date')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-outline-danger btn-block mb-3 form-control"
                                    wire:click="removeInput({{ $key }},'education_level')">
                                    <span><i class="fas fa-times"></i></span>
                                </button>
                            </li>
                        @else
                            <li>
                                <div class="mb-2 form-group">
                                    <label for="education_levels_{{ $key }}_level"
                                        class="form-lable">{{ __('Level of Education') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="education_levels_{{ $key }}_level"
                                        wire:model.defer="education_levels.{{ $key }}.education_level"
                                        required>
                                    @error('education_levels.' . $key . '.education_level')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="education_levels_{{ $key }}_start_date"
                                        class="form-lable">{{ __('Start Date') }}
                                    </label>
                                    <input type="date" class="form-control mb-3"
                                        id="education_levels_{{ $key }}_start_date"
                                        wire:model.defer="education_levels.{{ $key }}.start_date" required>
                                    @error('education_levels.' . $key . '.start_date')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="education_levels_{{ $key }}_end_date"
                                        class="form-lable">{{ __('End Date') }}
                                    </label>
                                    <input type="date" class="form-control mb-3"
                                        id="education_levels_{{ $key }}_end_date"
                                        wire:model.defer="education_levels.{{ $key }}.end_date" required>
                                    @error('education_levels.' . $key . '.end_date')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ol>
                <div class="container  d-flex justify-content-end align-content-center  mb-3">
                    <button class="btn btn-success" wire:click="addInput('education_level')"type="button">
                        {{ __('Add education Level') }}
                    </button>
                </div>
            </div>

            {{-- Skills --}}
            <div class="">
                <h4>{{ __('Skills') }}</h4>
                <ol>
                    @foreach ($skills as $key => $skill)
                        @if ($key > 0)
                            <li>
                                <div class="mb-2 form-group">
                                    <label for="skills_{{ $key }}_skill"
                                        class="form-lable">{{ __('Skills') }}
                                    </label>
                                    <textarea type="text" class="form-control mb-3" id="skills_{{ $key }}_skill"
                                        wire:model.defer="skills.{{ $key }}.skill" required></textarea>
                                    @error('skills.' . $key . '.skill')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-outline-danger btn-block mb-3 form-control"
                                    wire:click="removeInput({{ $key }},'skill')">
                                    <span><i class="fas fa-times"></i></span>
                                </button>
                            </li>
                        @else
                            <li>
                                <div class="mb-2 form-group">
                                    <label for="skills_{{ $key }}_skill"
                                        class="form-lable">{{ __('Skills') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="skills_{{ $key }}_skill"
                                        wire:model.defer="skills.{{ $key }}.skill" required>
                                    @error('skills.' . $key . '.skill')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ol>
                <div class="container  d-flex justify-content-end align-content-center  mb-3">
                    <button class="btn btn-success" wire:click="addInput('skill')"type="button">
                        {{ __('Add skill') }}
                    </button>
                </div>
            </div>

            {{-- Referees --}}
            <div class="">
                <h4>{{ __('Referees') }}</h4>
                <ol>
                    @foreach ($referees as $key => $referee)
                        @if ($key > 1)
                            <li>
                                <div class="mb-2 form-group">
                                    <label for="referee_{{ $key }}_name"
                                        class="form-lable">{{ __('Name') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="referee_{{ $key }}_name"
                                        wire:model.defer="referees.{{ $key }}.name" required>
                                    @error('referees.' . $key . '.name')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="referee_{{ $key }}_relationship"
                                        class="form-lable">{{ __('Relationship') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="referee_{{ $key }}_relationship"
                                        wire:model.defer="referees.{{ $key }}.relationship" required>
                                    @error('referees.' . $key . '.relationship')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="referee_{{ $key }}_phone_number"
                                        class="form-lable">{{ __('Phone Number') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="referee_{{ $key }}_phone_number"
                                        wire:model.defer="referees.{{ $key }}.phone_number" required>
                                    @error('referees.' . $key . '.phone_number')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="referee_{{ $key }}_email"
                                        class="form-lable">{{ __('Email') }}
                                    </label>
                                    <input type="email" class="form-control mb-3"
                                        id="referee_{{ $key }}_email"
                                        wire:model.defer="referees.{{ $key }}.email" required>
                                    @error('referees.' . $key . '.email')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="referee_{{ $key }}_institution"
                                        class="form-lable">{{ __('Institution') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="referee_{{ $key }}_institution"
                                        wire:model.defer="referees.{{ $key }}.institution" required>
                                    @error('referees.' . $key . '.institution')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="referee_{{ $key }}_posititon"
                                        class="form-lable">{{ __('Posititon in the Institution') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="referee_{{ $key }}_posititon"
                                        wire:model.defer="referees.{{ $key }}.position" required>
                                    @error('referees.' . $key . '.position')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-outline-danger btn-block mb-3 form-control"
                                    wire:click="removeInput({{ $key }},'referee')">
                                    <span><i class="fas fa-times"></i></span>
                                </button>
                            </li>
                        @else
                            <li>
                                <div class="mb-2 form-group">
                                    <label for="referee_{{ $key }}_name"
                                        class="form-lable">{{ __('Name') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="referee_{{ $key }}_name"
                                        wire:model.defer="referees.{{ $key }}.name" required>
                                    @error('referees.' . $key . '.name')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="referee_{{ $key }}_relationship"
                                        class="form-lable">{{ __('Relationship') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="referee_{{ $key }}_relationship"
                                        wire:model.defer="referees.{{ $key }}.relationship" required>
                                    @error('referees.' . $key . '.relationship')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="referee_{{ $key }}_phone_number"
                                        class="form-lable">{{ __('Phone Number') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="referee_{{ $key }}_phone_number"
                                        wire:model.defer="referees.{{ $key }}.phone_number" required>
                                    @error('referees.' . $key . '.phone_number')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="referee_{{ $key }}_email"
                                        class="form-lable">{{ __('Email') }}
                                    </label>
                                    <input type="email" class="form-control mb-3"
                                        id="referee_{{ $key }}_email"
                                        wire:model.defer="referees.{{ $key }}.email" required>
                                    @error('referees.' . $key . '.email')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="referee_{{ $key }}_institution"
                                        class="form-lable">{{ __('Institution') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="referee_{{ $key }}_institution"
                                        wire:model.defer="referees.{{ $key }}.institution" required>
                                    @error('referees.' . $key . '.institution')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-2 form-group">
                                    <label for="referee_{{ $key }}_position"
                                        class="form-lable">{{ __('Posititon in the Institution') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="referee_{{ $key }}_position"
                                        wire:model.defer="referees.{{ $key }}.position" required>
                                    @error('referees.' . $key . '.position')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ol>
                <div class="container  d-flex justify-content-end align-content-center  mb-3">
                    <button class="btn btn-success" wire:click="addInput('referee')"type="button">
                        {{ __('Add Referee') }}
                    </button>
                </div>
            </div>

            <div class="d-flex justify-content-center align-content-center pb-3">
                <button class="btn btn-primary mb-3" type="submit">{{ __('Update/Save') }}</button>
            </div>
        </div>
    </form>
    <x-notification-modal>
        <x-slot:title>
            {{ $feedback_header }}
        </x-slot:title>
        <x-slot:body class="{{ $alert_class }}">
            {{ $feedback }}
        </x-slot:body>
    </x-notification-modal>
    <script>
        window.addEventListener('biodata_action_confirm', (event) => {
            $("#prompt-modal-btn").click();
        })
        window.addEventListener('biodata_action_feedback', (event) => {
            $("#notification-modal-btn").click();
        })
    </script>
</div>
