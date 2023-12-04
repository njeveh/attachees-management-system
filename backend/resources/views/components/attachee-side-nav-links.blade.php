<x-side-nav>
    <x-slot:heading>
        JKUAT Industrial <br /> Attachment Portal
    </x-slot:heading>
    <x-slot:links>
    <li>
        <a href="/">
            <span class="icon"><i class="fas fa-home" style="width: 10%;"></i></span>
            <span>Home</span>
        </a>
    </li>
        <li>
            <a href="{{ route('attachee.home') }}">
                <span class="icon"><i class="fas fa-bar-chart" style="width: 10%;"></i></span>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#profileSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon"><i class="fas fa-user" style="width: 10%;"></i></span>
                <span>Profile</span>
            </a>
            <ul class="collapse list-unstyled" id="profileSubmenu">
                <li>
                    <a href="{{ route('attachee.profile') }}">View Profile</a>
                </li>
                <li>
                    <a href="{{ route('attachee.biodata') }}">Biodata</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('attachee.applications') }}">
                <span class="icon"><i class="fas fa-edit" style="width: 10%;"></i></span>
                <span>Applications</span>
            </a>
        </li>
        <li>
            <a href="{{ route('attachee.notifications') }}">
                <span class="icon"><i class="fas fa-bell" style="width: 10%;"></i></span>
                <span>Notifications</span>
                @livewire('attachee.notification-badge')
            </a>
        </li>
        <li>
            <a href="#downloadsSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon"><i class="fas fa-download" style="width: 10%;"></i></span>
                <span>Downloads</span>
            </a>
            <ul class="collapse list-unstyled" id="downloadsSubmenu">
                <li>
                    <a href=" {{ route('attachee.reviewed_applications') }}">Application response letter</a>
                </li>
                <li>
                    <a href="{{ route('attachee.recommendation-letters') }}">Recommendation letter</a>
                </li>
            </ul>
        </li>
    </x-slot:links>
</x-side-nav>
