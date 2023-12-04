<x-app-layout>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-attachee-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content">
                <div class="page-title">
                    <h3>{{ $application->advert->studyArea->title }}/Ref: {{ $application->advert->reference_number }}</h3>
                </div>
                <div>
                    @if (session()->has('success'))
                        <div class="alert alert-success m-5">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('server_error'))
                        <div class="alert alert-danger m-5">
                            {{ session('server_error') }}
                        </div>
                    @endif
                    <h4> (Downloads and Links) </h4>
                    @if ($application->status == 'revoked')
                        <div>Sorry there are no downloads for this application. Your application acceptance was revoked.
                            Please contact JKUAT Central Services Offices for more information.</div>
                    @elseif($application->status == 'accepted')
                        <a href=' {{ '/attachee/application-response-letter/' . $application->id }} '
                            class="btn btn-primary m-2"> {{ __('Offer Letter') }} </a>
                        <a href=' {{ '/attachee/offer-acceptance/' . $application->id }} ' class="btn btn-primary m-2">
                            {{ __('Accept Offer') }} </a>
                    @elseif($application->status == 'rejected')
                        <a href=' {{ '/attachee/application-response-letter/' . $application->id }} '
                            class="btn btn-primary m-2"> {{ __('Response Letter') }} </a>
                    @endif
                </div>
            </main>
            <x-footer />
        </div>

    </div>
</x-app-layout>
