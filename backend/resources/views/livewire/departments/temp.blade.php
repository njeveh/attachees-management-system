<div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-department-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content">
                <div class="page-title">
                    <h3>{{ $advert->title . ' /Ref: ' . $advert->reference_number }}</h3>
                </div>
                @if (count($applications))
                    {{-- Active Applications --}}
                    <section class="overflow-auto">
                        <div>
                            <h1>Active applications</h1>
                        </div>
                        @if (count($active_applications))
                            {{-- Active Pending Applications Table --}}
                            @if (count($pending_applications))
                                <table class="table table-hover tabls-responsive-sm mb-5">
                                    <thead>
                                        <tr class="bg-info">
                                            <th colspan='5'>
                                                <div class="d-flex align-content-center justify-content-center">
                                                    Pending Applications
                                                </div>
                                            </th>
                                        </tr>
                                        <tr class="bg-dark text-light">
                                            <th scope="col">No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Year</th>
                                            <th scope="col">Quarter</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($pending_applications as $pending_application)
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td class="align-middle">
                                                    {{ $pending_application->attachee->first_name }}
                                                    {{ $pending_application->attachee->second_name }}</th>
                                                <td class="align-middle">{{ $pending_application->advert->year }}</td>
                                                <td class="align-middle">{{ $pending_application->quarter }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-md">
                                                        <button class="btn btn-success">View</button>
                                                        <button class="btn btn-primary">Accept</button>
                                                        <button class="btn btn-danger">Reject</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                                ++$i;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                            @if (count($accepted_applications))
                                {{-- Active Accepted Applications Table --}}

                                <table class="table table-hover tabls-responsive-sm mb-5">
                                    <thead>
                                        <tr class="bg-success">
                                            <th colspan='5'>
                                                <div class="d-flex align-content-center justify-content-center">
                                                    Accepted Applications
                                                </div>
                                            </th>
                                        </tr>
                                        <tr class="bg-dark text-light">
                                            <th scope="col">No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Year</th>
                                            <th scope="col">Quarter</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($accepted_applications as $accepted_application)
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td class="align-middle">
                                                    {{ $accepted_application->attachee->first_name }}
                                                    {{ $accepted_application->attachee->second_name }}</th>
                                                <td class="align-middle">{{ $accepted_application->advert->year }}</td>
                                                <td class="align-middle">{{ $accepted_application->quarter }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-md">
                                                        <button class="btn btn-success">View</button>
                                                        <button class="btn btn-danger">Revoke</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                                ++$i;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                            {{-- Active Rejected Applications Table --}}
                            @if (count($rejected_applications))
                                <table class="table table-hover tabls-responsive-sm mb-5">
                                    <thead>
                                        <tr class="bg-danger">
                                            <th colspan='5'>
                                                <div class="d-flex align-content-center justify-content-center">
                                                    Rejected Applications
                                                </div>
                                            </th>
                                        </tr>
                                        <tr class="bg-dark text-light">
                                            <th scope="col">No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Year</th>
                                            <th scope="col">Quarter</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($rejected_applications as $rejected_application)
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td class="align-middle">
                                                    {{ $rejected_application->attachee->first_name }}
                                                    {{ $rejected_application->attachee->second_name }}</th>
                                                <td class="align-middle">{{ $rejected_application->advert->year }}</td>
                                                <td class="align-middle">{{ $rejected_application->quarter }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-md">
                                                        <button class="btn btn-success">View</button>
                                                        <button class="btn btn-primary">Undo Rejection</button>
                                                        <button class="btn btn-danger">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                                ++$i;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                            {{-- Active canceled Applications Table --}}
                            @if (count($canceled_applications))
                                <table class="table table-hover tabls-responsive-sm mb-5">
                                    <thead>
                                        <tr class="bg-warning">
                                            <th colspan='5'>
                                                <div class="d-flex align-content-center justify-content-center">
                                                    canceled Applications
                                                </div>
                                            </th>
                                        </tr>
                                        <tr class="bg-dark text-light">
                                            <th scope="col">No.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Year</th>
                                            <th scope="col">Quarter</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($canceled_applications as $canceled_application)
                                            <tr>
                                                <th scope="row">{{ $i }}</th>
                                                <td class="align-middle">
                                                    {{ $canceled_application->attachee->first_name }}
                                                    {{ $canceled_application->attachee->second_name }}</th>
                                                <td class="align-middle"> {{ $canceled_application->advert->year }}
                                                </td>
                                                <td class="align-middle">{{ $canceled_application->quarter }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-md">
                                                        <button class="btn btn-success">View</button>
                                                        <button class="btn btn-primary">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                                ++$i;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        @else
                            <div>
                                <p>No Active Applications to show yet</p>
                            </div>
                        @endif
                    </section>
                    @if (count($inactive_applications))
                        {{-- Inactive Applications --}}
                        <section class="overflow-auto">
                            <div>
                                <h1>Inactive applications</h1>
                            </div>

                            <table class="table table-hover tabls-responsive-sm mb-5">
                                <thead>
                                    <tr class="bg-secondary">
                                        <th colspan='5'>
                                            <div class="d-flex align-content-center justify-content-center">
                                                Inactive Applications
                                            </div>
                                        </th>
                                    </tr>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Quarter</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($inactive_applications as $inactive_application)
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td class="align-middle">
                                                {{ $inactive_application->attachee->first_name }}
                                                {{ $inactive_application->attachee->second_name }}</th>
                                            <td class="align-middle">{{ $inactive_application->advert->year }}</td>
                                            <td class="align-middle">{{ $inactive_application->quarter }}</td>
                                            <td>
                                                <div class="btn-group btn-group-md">
                                                    <button class="btn btn-success">View</button>
                                                    <button class="btn btn-danger">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            ++$i;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>

                        </section>
                    @endif
                @else
                    <div>
                        <p>No Applications to show yet</p>
                    </div>
                @endif
                <x-footer />
        </div>
    </div>
</div>
