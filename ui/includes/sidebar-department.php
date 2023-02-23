<nav id="sidebar">
    <div class="sidebar-header">
        <a href="<?php echo BASE_URL . "/index.php" ?>">
            <img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="JKUAT Logo" />
        </a>
        <h3>Department of <br /> Computing</h3>
        <div style="border-bottom: 1px solid white; width: 80%; margin: 10px auto;"></div>
    </div>

    <ul class="list-unstyled components">
        <p>Menu</p>
        <li>
            <a href="<?php echo BASE_URL . "/department" ?>">
                <span class="icon"><i class="fas fa-chart-line" style="width: 10%;"></i></span>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="<?php echo BASE_URL . "/pages/department-notifications" ?>">
                <span class="icon"><i class="fas fa-bell" style="width: 10%;"></i></span>
                <span>Notifications</span>
            </a>
        </li>

        <li>
            <a href="<?php echo BASE_URL . "/pages/new-advert" ?>">
                <span class="icon"><i class="fas fa-plus-circle" style="width: 10%;"></i></span>
                <span>New Advert</span>
            </a>
        </li>

        <li>
            <a href="<?php echo BASE_URL . "/pages/adverts" ?>">
                <span class="icon"><i class="fas fa-list" style="width: 10%;"></i></span>
                <span>View Adverts</span>
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL . "/pages/department-view-applications" ?>">
                <span class="icon"><i class="fas fa-list-ol"></i></span>
                <span>View Applications</span>
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL . "/pages/department-reporting" ?>">
                <span class="icon"><i class="fas fa-envelope" style="width: 10%;"></i></span>
                <span>Reporting</span></a>
        </li>
        <li>
            <a href="<?php echo BASE_URL . "/pages/teams" ?>">
                <span class="icon"><i class="fas fa-users" style="width: 10%;"></i></span>
                <span>Teams</span></a>
        </li>
        <li>
            <a href="#recLettersSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon"><i class="fas fa-bars" style="width: 10%;"></i></span>
                <span>Rec Letters</span>
            </a>
            <ul class="collapse list-unstyled" id="recLettersSubmenu">
                <li>
                    <a href="<?php echo BASE_URL . "/pages/recommendation-letters" ?>">
                        <span class="icon"><i class="fas fa-envelope" style="width: 10%;"></i></span>
                        <span>View Letters</span></a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . "/pages/recommendation-letters/send-rec-letters.php" ?>">
                        <span class="icon"><i class="fas fa-envelope" style="width: 10%;"></i></span>
                        <span>Upload Letters</span></a>
                </li>
            </ul>
        </li>
    </ul>
</nav>