<x-app-layout>
    <x-slot:title>
        {{ __('Change Password') }}
    </x-slot:title>
    <div class="content-wrapper">
        <main class="content mt-5 mb-2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center justify-content-center m-2">
                                    {{ __('Change Password') }}</div>
                                <div class="d-flex justify-content-center align-content-center">
                                    <a href="{{ route('welcome.page') }}">
                                        <img src="/assets/static/logo.png" alt="logo"
                                            style="width:130px; height:130px;">
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('password.change_password') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="current-password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Current Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="current-password" type="password"
                                                class="form-control @error('current_password') is-invalid @enderror"
                                                name="current_password" value="{{ old('current_password') }}" required>

                                            @error('current_password')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

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
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Change Password') }}
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
        <x-footer />
    </div>
</x-app-layout>
