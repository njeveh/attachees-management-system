<div>
    <form class="mt-3" wire:submit.prevent="createStudyArea">
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
                    rows="10" required></textarea>
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
        window.addEventListener('action_feedback', (event) => {
            $("#notification-modal-btn").click();
        })
    </script>
</div>
