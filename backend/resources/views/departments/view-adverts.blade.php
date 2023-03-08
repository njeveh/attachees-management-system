@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-department-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div id="main-content">
                <div class="page-title">
                    <h3>Adverts</h3>
                </div>
                <section>
                    @if (count($data) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>

                                    <th scope="col">Title</th>
                                    <th scope="col">Reference</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Approval Status</th>
                                    <th scope="col">Activation Status</th>
                                    <th scope="col">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $advert)
                                    <tr>
                                        <th scope="row"><span><img src="/assets/static/logo.png" alt="JKUAT Logo"
                                                    style="width: 30px" /></span><span
                                                class="ml-2">{{ $advert->title }}</span></th>
                                        <td>{{ $advert->reference_number }}</td>
                                        <td>{{ $advert->year }}</td>
                                        <td>{{ $advert->approval_status }}</td>
                                        <td>{{ $advert->is_active ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href={{ '/departments/view-advert/' . $advert->id }}
                                                class="btn btn-primary w-100 mb-2">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="d-flex justify-content-center">No adverts to show yet.</div>
                    @endif
                </section>
            </div>
            <x-footer />
        </div>

    </div>
@endsection
