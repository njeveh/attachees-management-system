<x-app-layout>
    <x-slot:title>
        {{ __('Reset Password') }}
    </x-slot:title>
    <div class="wrapper">
        <div id="content">
            <main class="my-5 main-content">
                <div class="card shadow-lg m-auto p-5 bg-light rounded col-md-5 col-md-offset-3">
                    <div class="card-header bg-light">
                        <div class="d-flex justify-content align-content-center text-right">
                            <a href="{{ route('login') }}" style="color:green; text-align:justify;">
                                {{ __('< login') }}</a>
                        </div>
                        <div class="d-flex justify-content-center align-content-center">
                            <a href="{{ route('welcome.page') }}">
                                <img src="/assets/static/logo.png" alt="logo" style="width:130px; height:130px;">
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>

                        <!-- Session Status -->
                        <div class="mb-4 text-success">
                            {{ session('status') }}
                        </div>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="Enter your email address"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="card-footer d-flex justify-items-center justify-content-end mt-4">
                                <button class="btn btn-primary">
                                    {{ __('Email Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
            <x-footer />
        </div>
    </div>
</x-app-layout>
