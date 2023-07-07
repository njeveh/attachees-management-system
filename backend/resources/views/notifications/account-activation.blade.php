<x-app-layout>
    <x-slot:title>
        {{ __('Account Activation') }}
    </x-slot:title>
    <div class="content-wrapper">
        <main class="content my-5">
            <div class="card shadow-lg m-auto p-5 bg-white rounded col-md-5 col-md-offset-3">
                <div class="card-header">
                    <div>{{ __('Account Activation required') }}</div>
                    <div class="d-flex justify-content align-content-center text-right">
                        <a href="{{ route('welcome.page') }}" style="color:green; text-align:justify;">
                            {{ __('< Home') }}</a>
                    </div>
                    <div class="d-flex justify-content-center align-content-center">
                        <a href="welcome.page"><img src="/assets/static/logo.png" alt="logo"
                                style="width:130px; height:130px;"></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-danger">Your Account is currently deactivated. Please contact support team
                        or admin
                        for
                        assistance.
                    </div>
                </div>
            </div>
        </main>
        <x-footer />
    </div>
</x-app-layout>
