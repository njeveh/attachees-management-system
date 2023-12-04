<x-app-layout>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-department-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div class="card m-5 alert alert-warning">
                <div class="card-header">
                    {{ __('Study areas required first!') }}
                </div>
                <div class="card-body">
                    There are no study areas to associate the advert you intend to create with. Please create study area(s)
                    then proceed to create advert.
                </div>
            </div>
            <x-footer />
        </div>

    </div>
</x-app-layout>
