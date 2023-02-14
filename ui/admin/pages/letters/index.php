<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Letters</title>
</head>

<body>
    <main class="">
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php
            include(ROOT_PATH . '/includes/sidebar-nav.php')
            ?>
            <!-- Page Content  -->
            <div id="content">
                <?php
                include(ROOT_PATH . '/includes/navbar.php')
                ?>
                <div id="main-content">

                    <section>
                        <div class="page-title">
                            <h2>Letters</h2>
                        </div>
                        <div class="letters-section">
                            <div class="new-letter">
                                <div class="letter-box">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <p>New Letter</p>
                            </div>
                            <!-- Collection of sample letters -->
                            <div class="sample-letters">
                                <div class="letter-container">
                                    <div class="letter-box">
                                       
                                    </div>
                                    <p>Sample Acceptance Letter</p>
                                </div>
                                <div class="letter-container">
                                    <div class="letter-box">
                                       
                                    </div>
                                    <p>Sample Regret Letter</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="notifications-section">
                        <div class="page-title">
                            <h5>Acceptance Letters</h5>
                        </div>
                    </section>
                    <section class="notifications-section">
                        <div class="page-title">
                            <h5>Regret Letters</h5>
                        </div>
                    </section>

                </div>
                <?php
                include(ROOT_PATH . '/includes/footer.php')
                ?>
            </div>

        </div>

    </main>
</body>

</html>