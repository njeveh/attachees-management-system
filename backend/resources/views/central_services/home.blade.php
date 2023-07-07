<x-app-layout>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-central-services-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content" class="mb-5">
                <section class="welcome-banner">
                    <div>
                        <p>Welcome to Central Services</p>
                        <h2>Dashboard</h2>
                    </div>
                </section>
                <section class="statistics-section">
                    <div class="page-title">
                        <h5>Statistics</h5>
                    </div>
                    <div class="statistics-details">
                        <div class="graph-summary">
                            <p>Applications History</p>
                            <div class="chart-wrapper px-0" style="height:30vh;" height="70">
                                <canvas id="widgetChart1"></canvas>
                            </div>
                        </div>
                        <div class="summary-cards">
                            <div class="pending-approvals">
                                <p class="summary-card-title">Adverts Pending approval</p>
                                <p class="summary-number">{{ $pending_applications }}</p>
                            </div>
                            <div class="ongoing">
                                <p class="summary-card-title">Currently Active Attachees</p>
                                <p class="summary-number">{{ $active_attachees }}</p>
                            </div>
                        </div>
                    </div>
                </section>

            </main>
            <x-footer />
        </div>

    </div>
</x-app-layout>
