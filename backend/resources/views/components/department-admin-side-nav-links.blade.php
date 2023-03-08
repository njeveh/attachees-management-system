<x-side-nav>
    <x-slot:heading>
        {{ Auth::user()->departmentAdmin->department->name }}
    </x-slot:heading>
    <x-slot:links>
        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-chart-line" style="width: 10%;"></i></span>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-bell" style="width: 10%;"></i></span>
                <span>Notifications</span>
            </a>
        </li>

        <li>
            <a href="{{ route('departments.new_advert_form') }}">
                <span class="icon"><i class="fas fa-plus-circle" style="width: 10%;"></i></span>
                <span>New Advert</span>
            </a>
        </li>

        <li>
            <a href="{{ route('departments.view_adverts') }}">
                <span class="icon"><i class="fas fa-list" style="width: 10%;"></i></span>
                <span>View Adverts</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-list-ol"></i></span>
                <span>View Applications</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-envelope" style="width: 10%;"></i></span>
                <span>Reporting</span></a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-users" style="width: 10%;"></i></span>
                <span>Teams</span></a>
        </li>
        <li>
            <a href="#recLettersSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon"><i class="fas fa-bars" style="width: 10%;"></i></span>
                <span>Rec Letters</span>
            </a>
            <ul class="collapse list-unstyled" id="recLettersSubmenu">
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-envelope" style="width: 10%;"></i></span>
                        <span>View Letters</span></a>
                </li>
                <li>
                    <a href="#" ?>">
                        <span class="icon"><i class="fas fa-envelope" style="width: 10%;"></i></span>
                        <span>Upload Letters</span></a>
                </li>
            </ul>
        </li>
    </x-slot:links>
</x-side-nav>
