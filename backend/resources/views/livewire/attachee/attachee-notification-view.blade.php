<div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-attachee-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content">
                <div class="page-title">
                    <h2>{{ $notification->data['from'] }} ({{ $notification->data['title'] }})</h2>
                </div>
                <div>{{ $notification->data['message'] }}</div>

                <div>
                    @if ($notification->data['title'] == 'Application Response')
                        @foreach ($notification->data['links'] as $key => $link)
                            @if ($link != null)
                                <a @if ($notification->data['revocation_reasons'] != '') href="{{ $link }}{{ $notification->id }}"
                            @else
                            href="{{ $link }}" @endif
                                    class="btn btn-primary m-2">{{ preg_replace('/_/', ' ', $key) }}</a>
                            @endif
                        @endforeach
                    @endif
                    @if ($notification->data['title'] == 'End of Attachment/Internship Notice')
                        @foreach ($notification->data['links'] as $key => $link)
                            @if ($link != null)
                                <a href="{{ $link }}"
                                    class="btn btn-primary m-2">{{ preg_replace('/_/', ' ', $key) }}</a>
                            @endif
                        @endforeach
                    @endif

                </div>
            </main>
            <x-footer />
        </div>

    </div>
</div>
