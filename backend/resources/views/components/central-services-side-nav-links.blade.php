<x-side-nav>
    <x-slot:heading>
        Central Services
    </x-slot:heading>
    <x-slot:links>
        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-home" style="width: 10%;"></i></span>
                <span>{{ __('Dashboard') }}</span>
            </a>
        </li>
        <p>ADMIN DUTY</p>
        <li>
            <a href="{{ route('central_services.view_adverts') }}">
                <span class="icon"><i class="fas fa-bullseye" style="width: 10%;"></i></span>
                <span>{{ __('Adverts') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('central_services.users') }}">
                <span class="icon"><i class="fas fa-users" style="width: 10%;"></i></span>
                <span>{{ __('Users') }}</span>
            </a>
        </li>
        <li>
            <a href="{{ route('central_services.departments') }}">
                <span class="icon"><i class="fas fa-users-cog" style="width: 10%;"></i></span>
                <span>{{ __('Departments') }}</span></a>
        </li>
        <p>NOTIFICATIONS</p>
        <li>
            <a href="{{ route('central_services.notifications') }}">
                <span class="icon"><i class="fas fa-bell" style="width: 10%;"></i></span>
                <span> {{ __('Notifications') }}</span></a>
        </li>
        <p>APPLICATIONS</p>
        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-bell" style="width: 10%;"></i></span>
                <span>{{ __('Applications') }}</span></a>
        </li>

        <p>EVALUATIONS</p>
        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-star" style="width: 10%;"></i></span>
                <span>{{ __('Evaluations') }}</span></a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-download" style="width: 10%;"></i></span>
                <span>{{ __('Generate Evaluations') }}</span></a>
        </li>
        <p>REPORTS</p>
        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-bars" style="width: 10%;"></i></span>
                <span>{{ __('Reports') }}</span>
            </a>
        </li>
    </x-slot:links>
</x-side-nav>
