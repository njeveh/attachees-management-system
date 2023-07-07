<x-app-layout>
    <x-slot:title>
        {{ __('Dipca Admin Creation') }}
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
                                        {{ __('Create Department Admin account') }}
                                    </div>
                                    <div class="card-body">
                                        <form method="POST"
                                            action="{{ route('central_services.dipca-admin-registration') }}">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label for="staffId">{{ __('Staff ID') }}</label>
                                                <input type="text"
                                                    class="form-control @error('staff_id') is-invalid @enderror"
                                                    name="staff_id" id="staffId" value="{{ old('staff_id') }}"
                                                    placeholder="Staff Id" required>
                                                @error('staff_id')
                                                    <span class="invalid-feedback text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="firstName">{{ __('First Name') }}</label>
                                                <input id="firstName" type="text"
                                                    class="form-control @error('first_name') is-invalid @enderror"
                                                    name="first_name" value="{{ old('first_name') }}"
                                                    placeholder="First Name" required autocomplete="name" autofocus>

                                                @error('first_name')
                                                    <span class="invalid-feedback text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="lastName">{{ __('Last Name') }}</label>
                                                <input id="lastName" type="text"
                                                    class="form-control @error('last_name') is-invalid @enderror"
                                                    name="last_name" value="{{ old('last_name') }}"
                                                    placeholder="Last Name" required autocomplete="name" autofocus>

                                                @error('last_name')
                                                    <span class="invalid-feedback text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="email">{{ __('Email Address') }}</label>

                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}"
                                                    placeholder="Email Address" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="phoneNumber">{{ __('Phone Number') }}</label>
                                                <input id="phoneNumber" type="text"
                                                    class="form-control @error('phone_number') is-invalid @enderror"
                                                    name="phone_number" value="{{ old('phone_number') }}"
                                                    placeholder="Phone number" required autocomplete="on" autofocus>

                                                @error('phone_number')
                                                    <span class="invalid-feedback text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="password">{{ __('Password') }}</label>

                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" placeholder="Enter your password" required
                                                    autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" placeholder="Confirm your Password"
                                                    required autocomplete="new-password">
                                            </div>
                                            <div class="d-flex justify-content-end my-3" style=" border-radius:20%; ">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </form>
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        @if (session('error'))
                                            <div class="alert alert-danger py-1" role="alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
            <x-footer />

        </div>
    </div>
</x-app-layout>
