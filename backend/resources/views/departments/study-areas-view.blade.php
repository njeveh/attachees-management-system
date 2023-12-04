<x-app-layout>
    <x-slot:title>
        {{ auth()->user()->departmentAdmin->department->name }} Study Areas
    </x-slot:title>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-department-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div id="main-content">
                <div class="page-title">
                    <h3>Study Areas</h3>
                </div>
                <section>
                    @if (count($data) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>

                                    <th scope="col">Title</th>
                                    <th scope="col">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $study_area)
                                    <tr>
                                        <th scope="row"><span><img src="/assets/static/logo.png" alt="JKUAT Logo"
                                                    style="width: 30px" /></span><span
                                                class="ml-2">{{ $study_area->title }}</span></th>
                                        <td>
                                            <a href={{ '/departments/study-areas/' . $study_area->id }}
                                                class="btn btn-primary mb-2">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="d-flex justify-content-center">No study areas to show.</div>
                    @endif
                </section>
            </div>
            <x-footer />
        </div>

    </div>
</x-app-layout>
