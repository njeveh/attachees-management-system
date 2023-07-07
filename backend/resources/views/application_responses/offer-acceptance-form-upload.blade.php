<x-app-layout>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-attachee-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content" class="pb-5">
                <div class="page-title">
                    <h2>Upload Offer Acceptance Form</h2>
                </div>
                <div>
                    <form action="/attachee/offer-acceptance-form-upload/{{ $application_id }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="offer-acceptance-form">{{ __('Upload Form') }}</label>
                            <div class="input-group">
                                <input type="file" name="offer_acceptance_form" id="offer-acceptance-form"
                                    class="form-control @error('offer_acceptance_form') is-invalid @enderror" required
                                    validate>
                                <button class="btn btn-primary">upload</button>
                            </div>
                            @error('offer_acceptance_form')
                                <span class="alert alert-danger my-1 py-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </form>
                </div>
                @if (session()->has('upload_feedback'))
                    <div class="alert alert-success m-5">
                        {{ session('upload_feedback') }}
                    </div>
                @endif
                @if (session()->has('server_error'))
                    <div class="alert alert-danger m-5">
                        {{ session('server_error') }}
                    </div>
                @endif
            </main>
            <x-footer />
        </div>
    </div>
</x-app-layout>
