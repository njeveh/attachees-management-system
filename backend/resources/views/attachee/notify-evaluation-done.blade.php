<x-app-layout>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-attachee-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div class="card m-5 alert alert-warning">
                <div class="card-header">
                    {{ __('Evaluation Already Done') }}
                </div>
                <div class="card-body">
                    The requested page is inaccessible since you have already filled evaluation for the target
                    attachment program.
                    Evaluation can only be done once per program. Thank you for the time you took to fill the form.
                </div>
            </div>
            <x-footer />
        </div>

    </div>
</x-app-layout>
