<x-app-layout>
    <div class="" style="height:100vh;padding:50px 0 0 0 ;">
        <div class="container" style="position:relative;">
            <div class="row col-md-4 col-md-offset-3 card shadow-lg p-4 mb-5 bg-white rounded" style="margin:auto;">
                <div class="panel panel-primary">
                    <div class="panel-heading text-right">
                        <a href="{{ route('welcome.page') }}" style="color:green; text-align:justify;">
                            {{ __('< Home') }}</a>
                    </div>
                    <div
                        style="display: flex; width:100%; justify-content:center; align-items:center; margin-top:-20px 0 10px 0">
                        <a href="{{ route('welcome.page') }}">
                            <img src="/assets/static/logo.png" alt="logo" style="width:130px; height:130px;">
                        </a>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger py-1" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="panel panel-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="Enter your email address"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="Enter your password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-flex flex-wrap-reverse align-content-end justify-content-between mt-2">
                                @if (Route::has('password.request'))
                                    <div class="">
                                        <small><a
                                                href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></small>
                                    </div>
                                @endif
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary panel text-right"
                                        style="color:white; background-color:green;">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel panel-footer text-center">
                    <small>Don't have an account? <a
                            href="{{ route('applicant.registration') }}">{{ __('Register') }}</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
