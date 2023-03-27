<x-app-layout>
    <x-slot:title>
        {{ __('Registration') }}
    </x-slot:title>
    <div class="content-wrapper">
        <main class="content my-5">
            <div class="card shadow-lg m-auto p-5 bg-white rounded col-md-5 col-md-offset-3">
                <div class="card-header">
                    <div class="d-flex justify-content align-content-center text-right">
                        <a href="{{ route('welcome.page') }}" style="color:green; text-align:justify;">
                            {{ __('< Home') }}</a>
                    </div>
                    <div class="d-flex justify-content-center align-content-center">
                        <a href="{{ route('welcome.page') }}">
                            <img src="/assets/static/logo.png" alt="logo" style="width:130px; height:130px;">
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="idNumber">{{ __('National ID Number') }}</label>
                            <input type="text" class="form-control @error('id_number') is-invalid @enderror"
                                name="id_number" id="idNumber" value="{{ old('id_number') }}"
                                placeholder="Enter your National ID Number" required>
                            @error('id_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="firstName">{{ __('First Name') }}</label>
                            <input id="firstName" type="text"
                                class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                value="{{ old('first_name') }}" placeholder="Enter your First Name" required
                                autocomplete="first_name" autofocus>

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="lastName">{{ __('Last Name') }}</label>
                            <input id="lastName" type="text"
                                class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                value="{{ old('last_name') }}" placeholder="Enter your Last Name" required
                                autocomplete="last_name" autofocus>

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">{{ __('Email Address') }}</label>

                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="Enter your Email Address" required
                                autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="institution">{{ __('Institution') }}</label>

                            <input id="institution" type="text"
                                class="form-control @error('institution') is-invalid @enderror" name="institution"
                                value="{{ old('institution') }}" placeholder="Enter your Institution"
                                autocomplete="institution" required>

                            @error('institution')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">{{ __('Password') }}</label>

                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Enter your password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" placeholder="Confirm your Password" required
                                autocomplete="new-password">
                        </div>
                        <div class="d-flex justify-content-end my-3" style=" border-radius:20%; ">
                            <button type="submit" class="btn btn-primary" style="color:white; background-color:green;">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>Have an account? <a class="card-link" href="{{ route('login') }}"> Sign In </a> </small>
                </div>
            </div>
        </main>
        <x-footer />
    </div>
</x-app-layout>
