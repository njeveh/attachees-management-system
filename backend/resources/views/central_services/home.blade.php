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
                        <p>Welcome to your</p>
                        <h2>Dashboard</h2>
                    </div>
                </section>
                <section class="notifications-section">
                    <div class="page-title">
                        <h5>Notifications</h5>
                    </div>
                    <div class="notifications-display ">
                        <p>No new notifications</p>
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
                                <p class="summary-card-title">Pending approvals</p>
                                <p class="summary-number">5</p>
                            </div>
                            <div class="ongoing">
                                <p class="summary-card-title">Ongoing Attachments</p>
                                <p class="summary-number">1</p>
                            </div>
                        </div>
                    </div>
                </section>

            </main>
            <x-footer />
        </div>

    </div>
</x-app-layout>
