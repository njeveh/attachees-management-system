<div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-attachee-side-nav-links />
        <!-- Page Content  -->
        <main id="content">
            <x-navbar />
            <section>
                <div class="container">
                    <div class="bg-light p-4">
                        <h5>Welcome back to your</h5>
                        <h3 class="fw-bolder">Dashboard</h3>
                    </div>

                    <div class="mt-4">
                        <h3>My Applications</h3>
                        <div class="d-flex flex-row flex-wrap mb-5">
                            <div class="d-flex bg-primary flex-grow-1 rounded mb-3 p-3">
                                <div class="p-2 bg-info flex-fill d-flex justify-content-center align-items-center">Pending {{ $pending_applications}}</div>
                                <div class="p-2 bg-success flex-fill d-flex justify-content-center align-items-center">Approved {{ $approved_applications}}</div>
                                <div class="p-2 bg-warning flex-fill d-flex justify-content-center align-items-center">Cancelled {{ $cancelled_applications}}</div>
                                <div class="p-2 bg-danger flex-fill d-flex justify-content-center align-items-center">Rejected {{ $rejected_applications}}</div>
                                <div class="p-2 bg-secondary flex-fill d-flex justify-content-center align-items-center">Revoked {{ $revoked_applications}}</div>
                            </div>

                            <div class="d-flex flex-column ms-4">
                                <a href="{{ route('attachee.applications') }}">
                                    <div class="bg-primary p-2 rounded text-white">
                                        <h5>Total Applications</h5>
                                        <h2 class="container">{{ $applications}}</h2>
                                    </div>
                                </a>
                                <a href="{{ route('attachee.notifications') }}">
                                    <div class="bg-danger p-2 mt-2 rounded text-white">
                                        <h5>Unread Notifications</h5>
                                        <div class="container">
                                            <h2> @livewire('attachee.notification-badge')</h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <x-footer />
        </main>

    </div>
    </div>
