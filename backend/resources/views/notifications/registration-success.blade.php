@extends('layouts.app')
@section('title')
    Registration Success
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
                <div class="card-body">
                    <div class="alert alert-success">Your Account has been successfully created. Click on the button below
                        to login to your account.
                    </div>
                    <div>
                        <a href="{{ route('login') }}" class="btn btn-success">{{ __('Login') }}</a>
                    </div>
                </div>
            </div>
        </main>
        <x-footer />
    </div>
@endsection
