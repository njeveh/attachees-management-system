<x-app-layout>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-attachee-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content" class="pb-5">
                <div class="page-title">
                    <h2>Attachment Application</h2>
                </div>
                @livewire('attachee.apply', ['advert_id' => $advert_id])
            </main>
            <x-footer />
        </div>
    </div>
</x-app-layout>
