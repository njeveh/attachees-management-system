<x-app-layout>
    <x-slot:title>
        {{ auth()->user()->departmentAdmin->department->name }} {{ __('Applications') }}
    </x-slot:title>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-department-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content">
                <div class="page-title">
                    <h3>Applicable Adverts</h3>
                </div>
                <section>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Reference ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">No. of Pending Applications</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($adverts as $advert)
                                <tr>
                                    <th scope="row">{{ $advert->reference_number }}</th>
                                    <td>{{ $advert->title }}</td>
                                    <td>{{ $advert->applications->where('status', 'pending')->count() }}/{{ $advert->applications->count() }}
                                    </td>
                                    <td><a href="{{ route('departments.advert_applications', $advert->id) }}"
                                            class="btn btn-success">View Applications</a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </section>
            </main>
            <x-footer />
        </div>

    </div>
</x-app-layout>
