<x-app-layout>
    <x-slot:title>
        {{ __('Email Verification') }}
    </x-slot:title>
    <div class="content-wrapper">
        <main class="content py-5">
            <div class="card shadow-lg m-auto p-5 bg-light rounded col-md-5 col-md-offset-3">
                <div class="card-header bg-light">
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
                    {{ __('Before proceeding, You need to verify your email address by clicking on the link we just emailed to you. If you didn\'t receive the email, click on the resend verification email button below and we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <button class="btn btn-primary m-2">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn btn-success m-2">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </main>
        <x-footer />
    </div>
</x-app-layout>
