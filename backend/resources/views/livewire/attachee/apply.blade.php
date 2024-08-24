<div>

    <section>
        <form class="mt-3 needs-validation" wire:submit.prevent="apply">
            @csrf
            <div class="container">
                <div class="mb-3">
                    <h4>Upload Documents </h4>
                    <p class="text-danger">(All fields marked with an asterisk (*) are mandatory.)
                    </p>
                    <div class="form-group mb-3">
                        <label for="application-letter" class="form-label">{{ __('Application Letter') }}
                            <span class="text-danger">(pdf, docx or odt) *</span>
                        </label>
                        <input type="file" wire:model="application_letter" class="form-control" id="application-letter"
                            required>
                        @error('application_letter')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="insurance-cover" class="form-label">{{ __('Insurance Cover') }} <span class="text-danger">(pdf, jpg, jpeg or png) *</span></label>
                        <input type="file" wire:model="insurance_cover" class="form-control" id="insurance-cover"
                            required>
                        @error('insurance_cover')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="attachment-letter" class="form-label">{{ __('Attachment Letter') }} <span class="text-danger">(pdf, jpg, jpeg or png) * </span></label>
                        <input type="file" wire:model="attachment_letter" class="form-control" id="attachment-letter"
                            required>
                        @error('attachment_letter')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="identification-document-front" class="form-label">{{ __('Identification Document Front') }} <span class="text-danger">(pdf, jpg, jpeg or png) * </span></label>
                        <input type="file" wire:model="identification_document_front" class="form-control" id="identification-document-front"
                            required>
                        @error('identification_document_front')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="identification-document-back" class="form-label">{{ __('Identification Document Back') }} <span class="text-danger">(pdf, jpg, jpeg or png)</span></label>
                        <input type="file" wire:model="identification_document_back" class="form-control" id="identification-document-back">
                        @error('identification_document_back')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="attachment-start-date" class="form-label">{{ __('Select the date your attachment period begins.') }} <span class="text-danger">*</span></label>
                        <input type="date" wire:model="attachment_start_date" class="form-control" id="attachment-start-date">
                        @error('attachment_start_date')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="minimum-attachment-weeks" class="form-label">{{ __('Enter the minimum number of weeks you are supposed to be on attachment.') }} <span class="text-danger">*</span></label>
                        <input type="number" min="1" max="12" wire:model="minimum_attachment_weeks" class="form-control" id="minimum-attachment-weeks">
                        @error('minimum_attachment_weeks')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="expected-start-date" class="form-label">{{ __('Select the date your attachment period ends.') }} <span class="text-danger">*</span></label>
                        <input type="date" wire:model="attachment_end_date" class="form-control" id="attachment-end-date">
                        @error('expected_start_date')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                    
                </div>
                <div class="container text-right mb-3">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
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
