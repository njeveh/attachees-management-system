<div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-department-admin-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content">
                <div class="page-title">
                    <h2>{{ $notification->data['from'] }} ({{ $notification->data['title'] }})</h2>
                </div>
                <div>{{ $notification->data['message'] }}</div>

                <div>
                    @foreach ($notification->data['links'] as $key => $link)
                        @if ($link != null)
                            <a @if ($notification->data['revocation_reasons'] != '') href="{{ $link }}{{ $notification->id }}"
                            @else
                            href="{{ $link }}" @endif
                                class="btn btn-primary m-2">{{ preg_replace('/_/', ' ', $key) }}</a>
                        @endif
                    @endforeach

                </div>
            </main>
            <x-footer />
        </div>

    </div>
</div>
