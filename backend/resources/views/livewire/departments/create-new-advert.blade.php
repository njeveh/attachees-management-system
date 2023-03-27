<div>
    <form class="mt-3" wire:submit.prevent="createAdvert">
        @csrf
        <!-- New Advert -->
        <div class="container">
            <div class="form-group mb-3">
                <label for="title" class="form-label">{{ __('Title') }}</label>
                <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror"
                    id="title" required autocomplete="on">
                @error('title')
                    <span class="text-danger my-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="description" class="form-label">{{ __('Description') }}</label>
                <textarea class="form-control @error('description') is-invalid @enderror" wire:model="description" id="description"
                    rows="5" required></textarea>
                @error('description')
                    <span class="text-danger my-1">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <h4>{{ __('General Requirements') }}</h4>
                <ol>
                    @foreach ($gen_reqs as $key => $gen_req)
                        @if ($key > 0)
                            <li>
                                <div class="mb-3 form-group">
                                    <label for="input_{{ $key }}_gen_req" class="sr-only">General Requirement
                                        {{ $key }}</label>
                                    <div class="input-group mb-3">
                                        <textarea class="form-control mb-3 @error('gen_reqs.' . $key . '.gen_req') is-invalid @enderror"
                                            id="input_{{ $key }}_gen_req" wire:model.defer="gen_reqs.{{ $key }}.gen_req" rows="2"></textarea>
                                        <button type="button" wire:click="removeInput({{ $key }},'gen_req')"
                                            class="btn btn-danger mb-3">
                                            <span><i class="fas fa-close"></i></span>
                                        </button>
                                    </div>
                                    @error('gen_reqs.' . $key . '.gen_req')
                                        <span class="error text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </li>
                        @else
                            <li>
                                <div class="mb-3 form-group">
                                    <label for="input_{{ $key }}_gen_req" class="sr-only">General Requirement
                                        {{ $key }}</label>
                                    <textarea class="form-control mb-3 @error('gen_reqs.' . $key . '.gen_req') is-invalid @enderror"
                                        id="input_{{ $key }}_gen_req" wire:model.defer="gen_reqs.{{ $key }}.gen_req" rows="2"
                                        required></textarea>
                                    @error('gen_reqs.' . $key . '.gen_req')
                                        <span class="error text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ol>
                <div class="container  d-flex justify-content-end align-content-center  mb-3">
                    <button class="btn btn-success" wire:click="addInput('gen_req')"type="button">
                        {{ __('Add input field') }}
                    </button>
                </div>
            </div>
            <div class="form-group mb-3">
                <h4>{{ __('Professional Requirements') }}</h4>
                <ol>
                    @foreach ($prof_reqs as $key => $prof_req)
                        @if ($key > 0)
                            <li>
                                <div class="mb-3 form-group">
                                    <label for="input_{{ $key }}_prof_req" class="sr-only">General Requirement
                                        {{ $key }}</label>
                                    <div class="input-group mb-3">
                                        <textarea class="form-control mb-3 @error('prof_reqs.' . $key . '.prof_req') is-invalid @enderror"
                                            id="input_{{ $key }}_prof_req" wire:model.defer="prof_reqs.{{ $key }}.prof_req" rows="2"
                                            required></textarea>
                                        <button type="button"
                                            wire:click="removeInput({{ $key }}, 'prof_req')"
                                            class="btn btn-danger mb-3">
                                            <span><i class="fas fa-close"></i></span>
                                        </button>
                                    </div>
                                    @error('prof_reqs.' . $key . '.prof_req')
                                        <span class="error text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </li>
                        @else
                            <li>
                                <div class="mb-3 form-group">
                                    <label for="input_{{ $key }}_prof_req" class="sr-only">Professional
                                        Requirement
                                        {{ $key }}</label>
                                    <textarea class="form-control mb-3 @error('prof_reqs.' . $key . '.prof_req') is-invalid @enderror"
                                        id="input_{{ $key }}_prof_req" wire:model.defer="prof_reqs.{{ $key }}.prof_req" rows="2"
                                        required></textarea>
                                    @error('prof_reqs.' . $key . '.prof_req')
                                        <span class="error text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ol>
                <div class="container  d-flex justify-content-end align-content-center  mb-3">
                    <button class="btn btn-success" wire:click="addInput('prof_req')"type="button">
                        {{ __('Add input field') }}
                    </button>
                </div>
            </div>

            <div class="form-group mb-3">
                <h4>{{ __('Intern Responsibilities') }}</h4>
                <ol>
                    @foreach ($intern_responsibilities as $key => $intern_responsibility)
                        @if ($key > 0)
                            <li>
                                <div class="mb-3 form-group">
                                    <label for="input_{{ $key }}_intern_responsibility" class="sr-only">Intern
                                        Responsibility
                                        {{ $key }}</label>
                                    <div class="input-group mb-3">
                                        <textarea
                                            class="form-control mb-3 @error('intern_responsibilities.' . $key . '.intern_responsibility') is-invalid @enderror"
                                            id="input_{{ $key }}_intern_responsibility"
                                            wire:model.defer="intern_responsibilities.{{ $key }}.intern_responsibility" rows="2" required></textarea>
                                        <button type="button"
                                            wire:click="removeInput({{ $key }}, 'intern_responsibility')"
                                            class="btn btn-danger mb-3">
                                            <span><i class="fas fa-close"></i></span>
                                        </button>
                                    </div>
                                    @error('intern_responsibilities.' . $key . '.intern_responsibility')
                                        <span class="error text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </li>
                        @else
                            <li>
                                <div class="mb-3 form-group">
                                    <label for="input_{{ $key }}_intern_responsibility" class="sr-only">Intern
                                        Responsibility
                                        {{ $key }}</label>
                                    <textarea
                                        class="form-control mb-3 @error('intern_responsibilities.' . $key . '.intern_responsibility') is-invalid @enderror"
                                        id="input_{{ $key }}_intern_responsibility"
                                        wire:model.defer="intern_responsibilities.{{ $key }}.intern_responsibility" rows="2" required></textarea>
                                    @error('intern_responsibilities.' . $key . '.intern_responsibility')
                                        <span class="error text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ol>
                <div class="container  d-flex justify-content-end align-content-center  mb-3">
                    <button class="btn btn-success" wire:click="addInput('intern_responsibility')"type="button">
                        {{ __('Add input field') }}
                    </button>
                </div>
            </div>
            <div class="form-group mb-3">
                <h4>{{ __('Application Instructions') }}</h4>
                <textarea class="form-control mb-3 @error('how_to_apply') is-invalid @enderror" wire:model="how_to_apply"
                    rows="5" required></textarea>
                @error('how_to_apply')
                    <span class="error text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group flex-column mb-3">
                <label for="advert-year">{{ __('Year:') }}</label>
                <select class="form-control" id="advert-year" wire:model="year">
                    <option wire:click="setYear({{ date('Y') . '/' . date('Y') + 1 }})"
                        value={{ date('Y') . '/' . date('Y') + 1 }}>{{ date('Y') . '/' . date('Y') + 1 }}</option>
                    <option wire:click="setYear({{ date('Y') - 1 . '/' . date('Y') }})"
                        value={{ date('Y') - 1 . '/' . date('Y') }}>{{ date('Y') - 1 . '/' . date('Y') }}</option>
                </select>
            </div>
            <h4>{{ __('No. of vacancies') }}</h4>

            <div class="form-group mb-3">
                <label for="cohort-1-vacancies" class="form-label">{{ __('Cohort 1') }}</label>
                <input type="number" wire:model="cohort1_vacancies"
                    class="form-control @error('cohort1_vacancies') is-invalid @enderror" id="cohort-1-vacancies"
                    required>
                @error('cohort1_vacancies')
                    <span class="invalid-feedback text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="cohort-2-vacancies" class="form-label">{{ __('Cohort 2') }}</label>
                <input type="number" wire:model="cohort2_vacancies"
                    class="form-control @error('cohort2_vacancies') is-invalid @enderror" id="cohort-2-vacancies"
                    required>
                @error('cohort2_vacancies')
                    <span class="invalid-feedback text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="cohort-3-vacancies" class="form-label">{{ __('Cohort 3') }}</label>
                <input type="number" wire:model="cohort3_vacancies"
                    class="form-control @error('cohort3_vacancies') is-invalid @enderror" id="cohort-3-vacancies"
                    required>
                @error('cohort3_vacancies')
                    <span class="invalid-feedback text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="cohort-4-vacancies" class="form-label">{{ __('Cohort 4') }}</label>
                <input type="number" wire:model="cohort4_vacancies"
                    class="form-control @error('cohort4_vacancies') is-invalid @enderror" id="cohort-4-vacancies"
                    required>
                @error('cohort4_vacancies')
                    <span class="invalid-feedback text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex justify-content-end align-content-center pb-3">
                <button class="btn btn-primary mb-3" type="submit">{{ __('Submit') }}</button>
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
        window.addEventListener('advert_action_feedback', (event) => {
            $("#notification-modal-btn").click();
        })
    </script>
</div>
