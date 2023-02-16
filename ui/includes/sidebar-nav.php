<nav id="sidebar">
    <div class="sidebar-header">
        <a href="<?php echo BASE_URL . "/index.php" ?>">
            <img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="JKUAT Logo" />
        </a>
        <h3>JKUAT Attachment <br /> Portal</h3>
        <div style="border-bottom: 1px solid white; width: 80%; margin: 10px auto;"></div>
    </div>

    <ul class="list-unstyled components">
        <p>Menu</p>
        <li>
            <a href="<?php echo BASE_URL . "/index.php" ?>">
                <span class="icon"><i class="fas fa-home" style="width: 10%;"></i></span>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon"><i class="fas fa-user" style="width: 10%;"></i></span>
                <span>Profile</span>
            </a>
            <ul class="collapse list-unstyled" id="profileSubmenu">
                <li>
                    <a href="<?php echo BASE_URL . "/pages/profile" ?>">View Profile</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . "/pages/bio-data" ?>">View Bio-data</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo BASE_URL . "/pages/applications/index.php" ?>">
                <span class="icon"><i class="fas fa-edit" style="width: 10%;"></i></span>
                <span>Applications</span>
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL . "/pages/notifications/index.php" ?>">
                <span class="icon"><i class="fas fa-bell" style="width: 10%;"></i></span>
                <span>Notifications</span>
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL . "/pages/saved/index.php" ?>">
                <span class="icon"><i class="fas fa-bookmark" style="width: 10%;"></i></span>
                <span>Saved</span></a>
        </li>
        
        <li>
            <a href="<?php echo BASE_URL . "/pages/program-evaluation/index.php" ?>">
                <span class="icon"><i class="fas fa-star" style="width: 10%;"></i></span>
                <span>Evaluation</span></a>
        </li>
        <li>
            <a href="#downloadsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <span class="icon"><i class="fas fa-download" style="width: 10%;"></i></span>
                <span>Downloads</span>
            </a>
            <ul class="collapse list-unstyled" id="downloadsSubmenu">
                <li>
                    <a href="<?php echo BASE_URL . "/pages/downloads/application-response-letter.php" ?>">Application response letter</a>
                </li>
                <li>
                    <a href="<?php echo BASE_URL . "/pages/downloads/recommendation-letter.php" ?>">Recommendation letter</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>