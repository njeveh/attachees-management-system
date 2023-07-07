<?php
include '../config.php';
include(ROOT_PATH . '/dipca/includes/header.php')
?>
<title>Dashboard</title>
</head>

<body>
    <main class="">
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php
            include(ROOT_PATH . '/dipca/includes/sidebar-nav.php')
            ?>
            <!-- Page Content  -->
            <div id="content">
                <?php
                include(ROOT_PATH . '/dipca/includes/navbar.php')
                ?>
                <div id="main-content">
                    <section>
                        <div class="container">
                            <div class="bg-light p-4">
                                <h5>Welcome back to your</h5>
                                <h3 class="fw-bolder">Dashboard</h3>
                            </div>

                            <div class="mt-4">
                                <h3>Statistics</h3>
                                <div class="d-flex">
                                    <div class="bg-success w-75 rounded">
                                        Graph
                                    </div>

                                    <div class="d-flex flex-column ml-4">
                                        <div class="bg-primary p-2 rounded text-white">
                                            <h5>Completed Attachments</h5>
                                            <h2 class="container">5</h2>
                                        </div>

                                        <div class="bg-danger p-2 mt-2 rounded text-white">
                                            <h5>Ongoing Attachments</h5>
                                            <div class="container">
                                                <h2>1</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <?php
                include(ROOT_PATH . '/dipca/includes/footer.php')
                ?>
            </div>

        </div>

    </main>
</body>

</html>