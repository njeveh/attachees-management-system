@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-central-services-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div id="main-content">

                <section class="">
                    <div class="page-title">
                        <h2>Adverts</h2>
                    </div>
                </section>
                @if ($pending_adverts->count())
                    <section class="">
                        <div class="page-title">
                            <h5>Pending Adverts</h5>
                        </div>
                        <div class="display-box">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="custom-border" scope="col">Reference Id</th>
                                        <th class="custom-border" scope="col">Title</th>
                                        <th class="custom-border" scope="col">Date Posted</th>
                                        <th class="custom-border" scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pending_adverts as $pending_advert)
                                        <tr>
                                            <th scope="row">{{ $pending_advert->reference_number }}</th>
                                            <td>{{ $pending_advert->title }}</td>
                                            <td>{{ date_format($pending_advert->created_at, 'Y-M-d') }}</td>
                                            <td>Pending</td>
                                            <td><a
                                                    class="btn btn-primary action-button"href="{{ '/central-services/view-advert/' . $pending_advert->id }}">View
                                                    Advert</a></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </section>
                @endif
                @if ($approved_adverts->count())
                    <section class="">
                        <div class="page-title">
                            <h5>Approved Adverts</h5>
                        </div>
                        <div class="display-box">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="custom-border" scope="col">Reference Id</th>
                                        <th class="custom-border" scope="col">Title</th>
                                        <th class="custom-border" scope="col">Date Posted</th>
                                        <th class="custom-border" scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approved_adverts as $approved_advert)
                                        <tr>
                                            <th scope="row">{{ $approved_advert->reference_number }}</th>
                                            <td>{{ $approved_advert->title }}</td>
                                            <td>{{ date_format($approved_advert->created_at, 'Y-M-d') }}</td>
                                            <td>Approved</td>
                                            <td><a
                                                    class=" btn btn-primary action-button"href="{{ '/central-services/view-advert/' . $approved_advert->id }}">View
                                                    Advert</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                @endif

                @if ($disapproved_adverts->count())
                    <section class="">
                        <div class="page-title">
                            <h5>Disapproved Adverts</h5>
                        </div>
                        <div class="display-box">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="custom-border" scope="col">Reference Id</th>
                                        <th class="custom-border" scope="col">Title</th>
                                        <th class="custom-border" scope="col">Date Posted</th>
                                        <th class="custom-border" scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disapproved_adverts as $disapproved_advert)
                                        <tr>
                                            <th scope="row">{{ $disapproved_advert->reference_number }}</th>
                                            <td>{{ $disapproved_advert->title }}</td>
                                            <td>{{ date_format($disapproved_advert->created_at, 'Y-M-d') }}</td>
                                            <td>Approved</td>
                                            <td><a
                                                    class="btn btn-primary action-button"href="{{ '/central-services/view-advert/' . $disapproved_advert->id }}">View
                                                    Advert</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                @endif
            </div>
            <x-footer />
        </div>

    </div>
@endsection
