<div>
    <x-slot:title>
        {{ __('Recommendation Letters Uploads') }}
    </x-slot:title>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-department-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div class="fixed-filters bg-light">

                <x-loading-state-indicators />

                <div class="m-3">
                    <input type="text" class="form-control" wire:model="search" placeholder="Search">
                </div>
            </div>
            <div id="main-content" class="tab">
                <main>
                    <div class="page-title">
                        <h3>Upload Recommendation Letters.
                        </h3>
                    </div>
                    <section class="overflow-auto">
                        <table class="table table-hover table-responsive-sm mb-5">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">No.</th>
                                    <th scope="col">ID. No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Quarter</th>
                                    <th scope="col">Study Area</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @if ($attachees->count())
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($attachees as $attachee)
                                        <tr>
                                            <th scope="row" class="align-middle">{{ $i }}</th>
                                            <td class="align-middle">{{ $attachee->applicant->national_id }}</td>
                                            <td class="align-middle">
                                                {{ $attachee->applicant->first_name }}
                                                {{ $attachee->applicant->second_name }}</th>
                                            <td class="align-middle">{{ $attachee->year }}</td>
                                            <td class="align-middle">{{ $attachee->quarter }}</td>
                                            <td class="align-middle">
                                                {{ $attachee->study_area }}

                                            </td>

                                            <td>
                                                <button class="btn btn-primary" data-bs-toggle="collapse"
                                                    data-bs-target="#upload-letter-{{ $attachee->id }}">Upload Letter</button>
                                            </td>
                                        </tr>
                                        <tr class="m-0 p-0">
                                            <td colspan='7' class="m-0 p-0">
                                                <div wire:ignore.self
                                                    class="form-group mb-3 collapse bg-dark text-light p-2"
                                                    id="upload-letter-{{ $attachee->id }}">
                                                    <form id="reason-input-form-{{ $attachee->id }}"
                                                        wire:submit.prevent="upload('{{ $attachee->id }}')">
                                                        <label for="{{ $attachee->id }}" class="form-label">Please
                                                        select file to upload (mimes:pdf, docx, odt, jpg, jpeg, png)</label>
                                                            <input type="file" wire:model="recommendation_letter" id="recommendation-letter"
                                                                class="form-control @error('recommendation-letter') is-invalid @enderror" required
                                                                validate>
                                                        @error('recommendation_letter')
                                                            <span class="text-danger">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                        <button type="button"
                                                            wire:click="upload('{{ $attachee->id }}')"
                                                            class="btn btn-info btn-block form-control my-2">
                                                            Upload
                                                        </button>
                                                    </form>
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-block form-control my-2"
                                                        data-bs-toggle="collapse" aria-expanded="false"
                                                        data-bs-target="#upload-letter-{{ $attachee->id }}">
                                                        Cancel/Close
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            ++$i;
                                        @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan='7'>
                                            <h4>No attachees viable for a recommendation letter for now.</h4>
                                        </td>
                                    </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="mb-5">
                            {{-- {{ $attachees->links() }} --}}
                        </div>
                    </section>
                </main>
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
</div>
