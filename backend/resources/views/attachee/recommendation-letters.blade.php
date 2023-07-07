<x-app-layout>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-attachee-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content">
                <div class="page-title">
                    <h2>Recommendation Letters</h2>
                </div>
                <section>
                    <div class="container mt-3">
                        <div class="items-list">
                            @if ($recommendation_letters->count() > 0)
                                @foreach ($recommendation_letters as $recommendation_letter)
                                    <div class="list-item row shadow p-2 mb-5 bg-body rounded">
                                        <div
                                            class="col-12 col-md-8 d-flex align-content-center justify-content-start my-2">
                                            <div class="d-flex flex-row align-content-start">
                                                <div class="organization-logo">
                                                    <img src="/assets/static/logo.png" alt="logo">
                                                </div>
                                                <h5>{{ $recommendation_letter->attachee->department->name }}</h5>
                                            </div>
                                        </div>
                                        <div
                                            class="post-action col-12 col-md-4 d-flex align-items-center justify-content-start my-2">
                                            <a href="{{ Storage::url($recommendation_letter->path) }}"
                                                class="btn btn-success">View/Download</a>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="my-5"> {{ $adverts->links() }} </div> --}}
                            @else
                                <div
                                    class="card info-card d-flex flex-column justify-content-center align-items-center">
                                    <div class="m-2">
                                        You do not have any recommendation letters yet.
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
