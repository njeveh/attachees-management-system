<div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-attachee-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div id="main-content" class="mb-5">
                <div class="fixed-filters bg-light">
                    @if (session('error'))
                        <div class="alert alert-danger d-flex flex-row justify-content-between py-1" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success d-flex flex-row justify-content-between">
                            <div>{{ session('message') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <x-loading-state-indicators />
                </div>
                <div class="page-title">
                    <h3>Profile</h3>
                </div>
                <section>
                    <form wire:submit.prevent='updateProfile'>
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nationalId">{{ __('National ID Number') }}</label>
                            <input type="text" class="form-control @error('national_id') is-invalid @enderror"
                                id="nationalId" wire:model='national_id' required>
                            @error('national_id')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="firstName">{{ __('First Name') }}</label>
                            <input id="firstName" type="text"
                                class="form-control @error('first_name') is-invalid @enderror" wire:model='first_name'
                                required>

                            @error('first_name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="secondName">{{ __('Second Name') }}</label>
                            <input id="secondName" type="text"
                                class="form-control @error('second_name') is-invalid @enderror" wire:model='second_name'
                                required>

                            @error('second_name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">{{ __('Email Address') }}</label>

                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" wire:model='email' required>

                            @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="phoneNumber">{{ __('Phone Number') }}</label>
                            <input id="phoneNumber" type="text"
                                class="form-control @error('phone_number') is-invalid @enderror"
                                wire:model='phone_number' required>

                            @error('phone_number')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="institution">{{ __('Institution') }}</label>

                            <input id="institution" type="text"
                                class="form-control @error('institution') is-invalid @enderror" wire:model='institution'
                                required>

                            @error('institution')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="container text-right mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </section>
            </div>
            <x-footer />
        </div>
    </div>
</div>
