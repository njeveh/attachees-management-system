<x-side-nav>
    <x-slot:heading>
        DIPCA
    </x-slot:heading>
    <x-slot:links>

        <li>
            <a href="{{ route('dipca.home') }}">
                <span class="icon"><i class="fas fa-chart-line" style="width: 10%;"></i></span>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dipca.notifications') }}">
                <span class="icon"><i class="fas fa-bell" style="width: 10%;"></i></span>
                <span>Notifications</span>
            </a>
        </li>
        <li>
            <a href="{{ route('dipca.reports') }}">
                <span class="icon"><i class="fas fa-bars" style="width: 10%;"></i></span>
                <span>Reports</span>
            </a>
        </li>
        <!-- <li>
            <a href="#reportsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon"><i class="fas fa-bars" style="width: 10%;"></i></span>
                <span>Reports</span>
            </a>
            <ul class="collapse list-unstyled" id="reportsSubmenu">
                <li>
                    <a href="<#>">View Reports</a>
                </li>
                <li>
                    <a href="#">Download Reports</a>
                </li>
            </ul>
        </li> -->
    </x-slot:links>
</x-side-nav>
