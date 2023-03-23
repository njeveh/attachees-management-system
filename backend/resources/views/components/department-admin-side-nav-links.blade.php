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
            <a href="{{ route('departments.notifications') }}">
                <span class="icon"><i class="fas fa-bell" style="width: 10%;"></i></span>
                <span>Notifications</span>
            </a>
        </li>
        <li>
            <a href="#advertsSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon"><i class="fas fa-edit" style="width: 10%;"></i></span>
                <span>Adverts</span>
            </a>
            <ul class="collapse list-unstyled" id="advertsSubmenu">
                <li>
                    <a href="{{ route('departments.new_advert_form') }}">
                        <span class="icon"><i class="fas fa-plus-circle" style="width: 10%;"></i></span>
                        <span>New Advert</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('departments.view_adverts') }}">
                        <span class="icon"><i class="fas fa-eye" style="width: 10%;"></i></span>
                        <span>View Adverts</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#applicationsSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon"><i class="fas fa-edit" style="width: 10%;"></i></span>
                <span>Applications</span>
            </a>
            <ul class="collapse list-unstyled" id="applicationsSubmenu">
                <li>
                    <a href="{{ route('departments.applicable_adverts') }}">
                        <span class="icon"><i class="fas fa-eye"></i></span>
                        <span>View applicables</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-gear" style="width: 10%;"></i></span>
                        <span>Manage</span></a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#manageAttacheesSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon"><i class="fas fa-group" style="width: 10%;"></i></span>
                <span>Attachees</span>
            </a>
            <ul class="collapse list-unstyled" id="manageAttacheesSubmenu">
                <li>
                    <a href="{{ route('departments.attachee_reporting') }}">
                        <span class="icon"><i class="fas fa-user-check"></i></span>
                        <span>Reporting</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('departments.attachee_dismissal') }}">
                        <span class="icon"><i class="fas fa-user-slash"></i></span>
                        <span>Dismissing</span></a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-users-cog"></i></span>
                        <span>Manage Attachees</span></a>
                </li>
            </ul>
        </li>
        {{-- <li>
            <a href="#">
                <span class="icon"><i class="fas fa-users" style="width: 10%;"></i></span>
                <span>Teams</span></a>
        </li> --}}
        <li>
            <a href="#recLettersSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon"><i class="fas fa-envelope" style="width: 10%;"></i></span>
                <span>Rec Letters</span>
            </a>
            <ul class="collapse list-unstyled" id="recLettersSubmenu">
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-eye" style="width: 10%;"></i></span>
                        <span>View Letters</span></a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-upload" style="width: 10%;"></i></span>
                        <span>Upload Letters</span></a>
                </li>
            </ul>
        </li>
    </x-slot:links>
</x-side-nav>
