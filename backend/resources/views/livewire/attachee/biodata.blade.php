<div>

    <form class="mt-3" wire:submit.prevent="createUpdateBiodata">
        @csrf
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
            <div class="form-group">
                <label for="gender" class="form-label">
                    {{ __('Gender') }}</label>
                <div id="gender" class="@error('gender') is-invalid @enderror">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" wire:model="gender" value="M">M
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" wire:model="gender" value="F">F
                        </label>
                    </div>
                </div>
                @error('gender')
                    <span class="invalid-feedback text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="disability-field">
                Do you have any disability?
            </div>
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
                    <span class="error text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="{{ $disability_input_collapse }}">
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
            </div>
            {{-- Emergency Contacts --}}
            <div class="">
                <h4>{{ __('Emergency Contacts') }}</h4>
                <ol class="input-group-list">
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

            {{-- Education --}}
            <div class="">
            <h4>{{ __('Education') }}</h4>
                <div class="mb-3 form-group">
                    <label for="level-of-study" class="form-label">Level of Study (tick appropriately
                        below):</label>
                    <div id="level-of-study" class="@error('level_of_study') is-invalid @enderror">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" wire:model="level_of_study"
                                    value="masters">Masters
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" wire:model="level_of_study"
                                    value="bachelors">Bachelors
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" wire:model="level_of_study"
                                    value="diploma">Diploma
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" wire:model="level_of_study"
                                    value="certificate">Certificate
                            </label>
                        </div>
                    </div>
                    @error('level_of_study')
                        <span class="invalid-feedback text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="course-of-study"
                        class="form-label">{{ __('which course are you currently pursuing?') }}</label>
                    <input type="text" wire:model="course_of_study" class="form-control" id="course-of-study"
                        required>
                    @error('course_of_study')
                        <span class="error">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="year-of-study"
                        class="form-label">{{ __('which year of study are you in currently?') }}</label>
                    <input type="number" wire:model="year_of_study" class="form-control" id="year-of-study"
                        max='7' min='0' required>
                    @error('year_of_study')
                        <span class="error">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>                
            </div>

            {{-- Areas of interest --}}
            <div class="">
                <h4>{{ __('Areas of Interest') }}</h4>
                <ol class='input-group-list'>
                    @foreach ($areas_of_interest as $key => $area_of_interest)
                        @if ($key > 0)
                            <li>
                                <div class="mb-2 form-group">
                                    <label for="areas_of_interest_{{ $key }}_area_of_interest"
                                        class="form-lable">{{ __('Area of interest') }}
                                    </label>
                                    <textarea type="text" class="form-control mb-3" id="areas_of_interest_{{ $key }}_area_of_interest"
                                        wire:model.defer="areas_of_interest.{{ $key }}.area_of_interest" required></textarea>
                                    @error('areas_of_interest.' . $key . '.area_of_interest')
                                        <span class="error">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-outline-danger btn-block mb-3 form-control"
                                    wire:click="removeInput({{ $key }},'area_of_interest')">
                                    <span><i class="fas fa-times"></i></span>
                                </button>
                            </li>
                        @else
                            <li>
                                <div class="mb-2 form-group">
                                    <label for="areas_of_interest_{{ $key }}_area_of_interest"
                                        class="form-lable">{{ __('Area of interest') }}
                                    </label>
                                    <input type="text" class="form-control mb-3"
                                        id="areas_of_interest_{{ $key }}_area_of_interest"
                                        wire:model.defer="areas_of_interest.{{ $key }}.area_of_interest">
                                    @error('areas_of_interest.' . $key . '.area_of_interest')
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
                    <button class="btn btn-success" wire:click="addInput('area_of_interest')"type="button">
                        {{ __('Add Area of Interest') }}
                    </button>
                </div>
            </div>

            {{-- Referees --}}
            <div class="">
                <h4>{{ __('Referees') }}</h4>
                <ol class='input-group-list'>
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
