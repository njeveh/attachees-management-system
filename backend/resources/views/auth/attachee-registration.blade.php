@extends('layouts.app')
@section('title')
    Attachee Registration
@endsection
@section('content')
    <div class="content-wrapper">
        <main class="content my-5">
            <div class="card shadow-lg m-auto p-5 bg-white rounded col-md-5 col-md-offset-3">
                <div class="card-header">
                    <div class="d-flex justify-content align-content-center text-right">
                        <a href="{{ route('welcome.page') }}" style="color:green; text-align:justify;">
                            {{ __('< Home') }}</a>
                    </div>
                    <div class="d-flex justify-content-center align-content-center">
                        <img src="/assets/static/logo.png" alt="logo" style="width:130px; height:130px;">
                    </div>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger py-1" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('attachee.registration.submit') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nationalId">{{ __('National ID Number') }}</label>
                            <input type="text" class="form-control @error('national_id') is-invalid @enderror"
                                name="national_id" id="nationalId" value="{{ old('national_id') }}"
                                placeholder="Enter your National ID Number" required>
                            @error('national_id')
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
                                autocomplete="name" autofocus>

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="secondName">{{ __('Second Name') }}</label>
                            <input id="secondName" type="text"
                                class="form-control @error('second_name') is-invalid @enderror" name="second_name"
                                value="{{ old('second_name') }}" placeholder="Enter your Last Name" required
                                autocomplete="name" autofocus>

                            @error('second_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">{{ __('Email Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="Enter your Email Address" required
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
                                value="{{ old('institution') }}" placeholder="Enter your Institution" autocomplete="on"
                                required>

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

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                placeholder="Confirm your Password" required autocomplete="new-password">
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
@endsection
