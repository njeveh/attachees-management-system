<x-app-layout>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-department-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content" class="mb-5">
                <section class="welcome-banner">
                    <div>
                        <p>Welcome to {{ auth()->user()->departmentAdmin->department->name }}</p>
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
                                <p class="summary-card-title">Applications With Pending Review</p>
                                <p class="summary-number">{{ $pending_applications }}</p>
                            </div>
                            <div class="ongoing">
                                <p class="summary-card-title">Number of Current Attachees</p>
                                <p class="summary-number">{{ $current_attachees }}</p>
                            </div>
                        </div>
                    </div>
                </section>

            </main>
            <x-footer />
        </div>

    </div>
</x-app-layout>
