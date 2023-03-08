<x-side-nav>
    <x-slot:heading>
        JKUAT Attachment <br /> Portal
    </x-slot:heading>
    <x-slot:links>
        <a href="#">
            <span class="icon"><i class="fas fa-home" style="width: 10%;"></i></span>
            <span>Home</span>
        </a>
        </li>
        <li>
            <a href="#profileSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon"><i class="fas fa-user" style="width: 10%;"></i></span>
                <span>Profile</span>
            </a>
            <ul class="collapse list-unstyled" id="profileSubmenu">
                <li>
                    <a href="#">View Profile</a>
                </li>
                <li>
                    <a href="#">View Bio-data</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-edit" style="width: 10%;"></i></span>
                <span>Applications</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-bell" style="width: 10%;"></i></span>
                <span>Notifications</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-bookmark" style="width: 10%;"></i></span>
                <span>Saved</span></a>
        </li>

        <li>
            <a href="#">
                <span class="icon"><i class="fas fa-star" style="width: 10%;"></i></span>
                <span>Evaluation</span></a>
        </li>
        <li>
            <a href="#downloadsSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon"><i class="fas fa-download" style="width: 10%;"></i></span>
                <span>Downloads</span>
            </a>
            <ul class="collapse list-unstyled" id="downloadsSubmenu">
                <li>
                    <a href="#">Application response letter</a>
                </li>
                <li>
                    <a href="#">Recommendation letter</a>
                </li>
            </ul>
        </li>
    </x-slot:links>
</x-side-nav>
