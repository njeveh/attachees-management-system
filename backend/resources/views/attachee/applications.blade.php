<x-app-layout>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-attachee-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content">
                <div class="page-title">
                    <h2>Applications</h2>
                </div>
                <section>
                    <div class="container mt-3">
                        <div class="items-list">
                            @if ($applications->count() > 0)
                                @foreach ($applications as $application)
                                    <div class="list-item row shadow p-3 mb-5 bg-body rounded">
                                        <div
                                            class="col-12 col-md-6 d-flex align-content-center justify-content-start my-2">
                                            <div class="d-flex flex-row align-content-start">
                                                <div class="organization-logo">
                                                    <img src="/assets/static/logo.png" alt="logo">
                                                </div>
                                                <h5>{{ $application->advert->department->name }} :
                                                    {{ $application->advert->title }}</h5>
                                            </div>
                                        </div>
                                        <div
                                            class="col-12 col-md-4 d-flex align-items-center justify-content-start my-2">
                                            Status :
                                            @switch($application->status)
                                                @case('pending')
                                                    <span class="text-info">&nbsp Pending</span>
                                                @break

                                                @case('rejected')
                                                    <span class="text-danger">&nbsp Rejected</span>
                                                @break

                                                @case('accepted')
                                                    <span class="text-success">&nbsp Accepted</span>
                                                @break

                                                @case('canceled')
                                                    <span class="text-warning">&nbsp canceled</span>
                                                @break

                                                @default
                                                    <span class="text-secondary">Pending</span>
                                            @endswitch

                                        </div>
                                        <div
                                            class="post-action col-12 col-md-2 d-flex align-items-center justify-content-start my-2">
                                            <a href="{{ '/attachee/my-applications/' . $application->id . '/view-application' }}"
                                                class="btn btn-success">View</a>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="my-5"> {{ $adverts->links() }} </div> --}}
                            @else
                                <div
                                    class="card info-card d-flex flex-column justify-content-center align-items-center">
                                    <div class="m-2">
                                        You haven't made any applications yet.
                                    </div>
                                    <div class="mb-4">
                                        <a class="btn btn-success" href='/'>See featured Opportunities to
                                            apply.</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            </main>
            <x-footer />
        </div>

    </div>
</x-app-layout>
