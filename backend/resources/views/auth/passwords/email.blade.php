<x-app-layout>
    <x-slot:title>
        {{ __('Reset Password') }}
    </x-slot:title>
    <div class="wrapper">
        <div id="content">
            <main class="my-5 main-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-center m-2">
                                        {{ __('Reset Password') }}</div>
                                    <div class="d-flex justify-content align-content-center text-right">
                                        <a href="{{ route('login') }}" style="color:green; text-align:justify;">
                                            {{ __('< login') }}</a>
                                    </div>
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

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="email"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Send Password Reset Link') }}
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
