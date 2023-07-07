<x-app-layout>
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
                        <h3>Statistics</h3>
                        <div class="d-flex">
                            <div class="bg-success w-75 rounded">
                                Graph
                            </div>

                            <div class="d-flex flex-column ms-4">
                                <div class="bg-primary p-2 rounded text-white">
                                    <h5>My Applications</h5>
                                    <h2 class="container">5</h2>
                                </div>

                                <div class="bg-danger p-2 mt-2 rounded text-white">
                                    <h5>Notifications</h5>
                                    <div class="container">
                                        <h2>1</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <x-footer />
        </main>

    </div>
</x-app-layout>
