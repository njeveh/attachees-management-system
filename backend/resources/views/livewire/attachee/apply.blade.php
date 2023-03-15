<div>

    <section>
        <form class="mt-3 needs-validation" wire:submit.prevent="apply">
            @csrf
            <div class="container">
                <div class="mb-3">
                    <h4>Upload Documents</h4>
                    <div class="form-group mb-3">
                        <label for="application-letter" class="form-label">{{ __('Application Letter') }}</label>
                        <input type="file" wire:model="application_letter" class="form-control" id="application-letter"
                            required>
                        @error('application_letter')
                            <span class="error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="insurance-cover" class="form-label">{{ __('Insurance Cover') }}</label>
                        <input type="file" wire:model="insurance_cover" class="form-control" id="insurance-cover"
                            required>
                        @error('insurance_cover')
                            <span class="error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="attachment-letter" class="form-label">{{ __('Attachment Letter') }}</label>
                        <input type="file" wire:model="attachment_letter" class="form-control" id="attachment-letter"
                            required>
                        @error('attachment_letter')
                            <span class="error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="national-id-front" class="form-label">{{ __('National ID Front') }}</label>
                        <input type="file" wire:model="national_id_front" class="form-control" id="national-id-front"
                            required>
                        @error('national_id_front')
                            <span class="error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="national-id-back" class="form-label">{{ __('National ID Back') }}</label>
                        <input type="file" wire:model="national_id_back" class="form-control" id="national-id-back"
                            required>
                        @error('national_id_back')
                            <span class="error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="container text-right mb-3">
                    <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
                </div>
        </form>
    </section>


    <x-notification-modal>
        <x-slot:title>
            {{ $feedback_header }}
        </x-slot:title>
        <x-slot:body class="{{ $alert_class }}">
            {{ $feedback }}
            @if (isset($link))
                <div class="m-2 d-flex align-items-center justify-content-center">
                    <a class="btn btn-secondary" href={{ $link }}>Update Biodata</a>
                </div>
            @endif
        </x-slot:body>
    </x-notification-modal>
    <script>
        window.addEventListener('application_feedback', (event) => {
            $("#notification-modal-btn").click();
        })
    </script>
</div>
