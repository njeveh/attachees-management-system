<div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-department-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div id="main-content">
                <div class="page-title">
                    <h3>Edit Advert</h3>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger py-1" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <section>
                    <form class="mt-3" wire:submit.prevent="updateAdvert">
                        @csrf
                        <!-- Edit Advert -->
                        <div class="container">
                            <x-loading-state-indicators />

                            <div class="col form-group mb-3">
                                <label for="study-area">Study Area (select study area):</label>
                                <select class="form-select" id="study-area" wire:model='study_area'>
                                    @foreach ($study_areas as $key => $study_area_option)
                                        <option value='{{ $study_area_option->id }}'>{{ $study_area_option->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" wire:model="description" id="description"
                                    rows="10" required></textarea>
                                @error('description')
                                    <span class="text-danger my-1">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <h4>{{ __('Requirements:') }}</h4>
                                <ol>
                                    @foreach ($requirements as $key => $requirement)
                                        @if ($key > 0)
                                            <li>
                                                <div class="mb-3 form-group">
                                                    <div class="input-group mb-3">
                                                        <textarea class="form-control mb-3 @error('requirements.' . $key . '.requirement') is-invalid @enderror"
                                                            id="input_{{ $key }}_requirement" wire:model.defer="requirements.{{ $key }}.requirement"
                                                            rows="2"></textarea>
                                                        <button type="button"
                                                            wire:click="removeInput({{ $key }},'requirement')"
                                                            class="btn btn-danger mb-3">
                                                            <span><i class="fas fa-close"></i></span>
                                                        </button>
                                                    </div>
                                                    @error('requirements.' . $key . '.requirement')
                                                        <span class="error text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </li>
                                        @else
                                            <li>
                                                <div class="mb-3 form-group">
                                                    <textarea class="form-control mb-3 @error('requirements.' . $key . '.requirement') is-invalid @enderror"
                                                        id="input_{{ $key }}_requirement" wire:model.defer="requirements.{{ $key }}.requirement"
                                                        rows="2" required></textarea>
                                                    @error('requirements.' . $key . '.requirement')
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
                                    <button class="btn btn-success" wire:click="addInput('requirement')"type="button">
                                        {{ __('Add input field') }}
                                    </button>
                                </div>
                            </div>
                            <div class="form-group flex-column mb-3">
                                <label for="advert-year">{{ __('Year:') }}</label>
                                <select class="form-control" id="advert-year" wire:model="year">
                                    <option wire:click="setYear({{ date('Y') . '/' . date('Y') + 1 }})"
                                        value={{ date('Y') . '/' . date('Y') + 1 }}>
                                        {{ date('Y') . '/' . date('Y') + 1 }}</option>
                                    <option wire:click="setYear({{ date('Y') - 1 . '/' . date('Y') }})"
                                        value={{ date('Y') - 1 . '/' . date('Y') }}>
                                        {{ date('Y') - 1 . '/' . date('Y') }}</option>
                                </select>
                            </div>
                            <h4>{{ __('No. of vacancies') }}</h4>

                            <div class="form-group mb-3">
                                <label for="quarter-1-vacancies"
                                    class="form-label">{{ __('Quarter 1 (Jul-Sept):') }}</label>
                                <input type="number" wire:model="quarter1_vacancies"
                                    class="form-control @error('quarter1_vacancies') is-invalid @enderror"
                                    id="quarter-1-vacancies" required>
                                @error('quarter1_vacancies')
                                    <span class="invalid-feedback text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="quarter-2-vacancies"
                                    class="form-label">{{ __('Quarter 2 (Oct-Dec):') }}</label>
                                <input type="number" wire:model="quarter2_vacancies"
                                    class="form-control @error('quarter2_vacancies') is-invalid @enderror"
                                    id="quarter-2-vacancies" required>
                                @error('quarter2_vacancies')
                                    <span class="invalid-feedback text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="quarter-3-vacancies"
                                    class="form-label">{{ __('Quarter 3 (Jan-Mar):') }}</label>
                                <input type="number" wire:model="quarter3_vacancies"
                                    class="form-control @error('quarter3_vacancies') is-invalid @enderror"
                                    id="quarter-3-vacancies" required>
                                @error('quarter3_vacancies')
                                    <span class="invalid-feedback text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="quarter-4-vacancies"
                                    class="form-label">{{ __('Quarter 4 (Apr-Jun):') }}</label>
                                <input type="number" wire:model="quarter4_vacancies"
                                    class="form-control @error('quarter4_vacancies') is-invalid @enderror"
                                    id="quarter-4-vacancies" required>
                                @error('quarter4_vacancies')
                                    <span class="invalid-feedback text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end align-content-center pb-3">
                                <button class="btn btn-primary mb-3" type="submit">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <x-footer />
        </div>
    </div>
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
