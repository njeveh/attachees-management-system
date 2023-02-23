<nav id="sidebar">
    <div class="sidebar-header">
        <a href="<?php echo BASE_URL . "/index.php" ?>">
            <img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="JKUAT Logo" />
        </a>
        <h3>DIPCA</h3>
        <div style="border-bottom: 1px solid white; width: 80%; margin: 10px auto;"></div>
    </div>

    <ul class="list-unstyled components">
        <p>Menu</p>
        <li>
            <a href="<?php echo BASE_URL . "/dipca" ?>">
                <span class="icon"><i class="fas fa-chart-line" style="width: 10%;"></i></span>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="<?php echo BASE_URL . "/dipca/pages/notifications" ?>">
                <span class="icon"><i class="fas fa-bell" style="width: 10%;"></i></span>
                <span>Notifications</span>
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL . "/dipca/pages/reports/generate-reports.php" ?>">
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
                    <a href="<?php echo BASE_URL . "/dipca/pages/reports" ?>">View Reports</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . "/pages/downloads/recommendation-letter.php" ?>">Download Reports</a>
                </li>
            </ul>
        </li> -->
    </ul>
</nav>