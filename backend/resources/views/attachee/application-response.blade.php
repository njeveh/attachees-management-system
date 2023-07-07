<x-app-layout>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-attachee-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content">
                <div class="page-title">
                    <h3>{{ $application->advert->title }}/Ref: {{ $application->advert->reference_number }}/h3>
                </div>
                <div>
                <h4> (Downloads and Links) </h4>
                    @if($application->status == 'revoked')
                        <div>Sorry there are no downloads for this application. Your application acceptance was revoked. Please contact JKUAT Central Services Offices for more information.</div>
                    @elseif($application->status == 'accepted')
                        <a href=' {{ "/attachee/application-response-letter/". $application->id }} ' class="btn btn-primary m-2"> {{ __('Offer Letter') }} </a>
                        <a href=' {{ "/attachee/offer-acceptance-form/" . $application->id }} ' class="btn btn-primary m-2"> {{ __('Offer Acceptance Form') }} </a>
                        <a href=' {{ "/attachee/offer-acceptance-form-upload-page/". $application->id }} ' class="btn btn-primary m-2"> {{ __('Upload Offer Acceptance Form') }} </a>
                    @elseif($application->status == 'rejected')
                        <a href=' {{ "/attachee/application-response-letter/". $application->id }} ' class="btn btn-primary m-2"> {{ __('Response Letter') }} </a>
                    @endif
                </div>
            </main>
            <x-footer />
        </div>

    </div>
</x-app-layout>
