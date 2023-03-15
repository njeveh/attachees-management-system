<x-app-layout>
    <x-slot:title>
        {{ __('Feedback') }}
    </x-slot:title>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-attachee-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main class="my-5">
                <x-dashboard-request-feedback :alert_class='$alert_class'>
                    <x-slot:header>
                        {{ $header }}
                    </x-slot:header>
                    <x-slot:message>
                        {{ $message }}
                    </x-slot:message>
                    <x-slot:link>
                        {{ $link }}
                    </x-slot:link>
                    <x-slot:link_text>
                        {{ $link_text }}
                    </x-slot:link_text>
                </x-dashboard-request-feedback>
            </main>
            <x-footer />
        </div>

    </div>
</x-app-layout>
