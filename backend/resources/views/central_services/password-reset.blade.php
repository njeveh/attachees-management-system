<x-app-layout>
    <x-slot:title>
        {{ __('Reset User Password') }}
    </x-slot:title>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-central-services-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content" class="mb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-center m-2">
                                        {{ __('Reset Password') }}
                                    </div>
                                    <div class="card-body">
                                        @if(session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <form method="POST"
                                            action="{{ route('central_services.reset_user_password.submit') }}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $id }}">
                                            <div class="row mb-3">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                                <div class="col-md-6">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password-confirm"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required
                                                        autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Reset Password') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>

        </div>
        <x-footer />
    </div>
</x-app-layout>
