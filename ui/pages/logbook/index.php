<?php
include '../../config.php';
include_once (ROOT_PATH.'/includes/header.php');
?>
<title>Logbook</title>
</head>

<body>
    <main class="">
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php
            include (ROOT_PATH.'/includes/sidebar-nav.php')
            ?>

            <!-- Page Content  -->
            <div id="content">
                <?php
                include (ROOT_PATH.'/includes/navbar.php')
                ?>
                <div id="main-content">
                    <div class="page-title">
                        <h2>Logbook</h2>
                    </div>
                    <section>
                        <!-- LOGBOOK ENTRIES -->
                        <div class="mb-3 mt-3 container">
                            <div class="mb-3">
                                <h4>Date</h4>
                                <textarea class="form-control" id="logbookEntry" rows="6" disabled></textarea>
                            <div>

                            <div class="mb-3 mt-3">
                                <h4>Date</h4>
                                <textarea class="form-control" id="logbookEntry" rows="6" disabled></textarea>
                            <div>

                            <div class="mb-3 mt-3">
                                <h4>Date</h4>
                                <textarea class="form-control" id="logbookEntry" rows="6" disabled></textarea>
                            <div>
                        </div>
                        <div class="container text-right mt-3 mb-3">
                            <a href="<?php echo BASE_URL . "/pages/logbook/add-new-entry.php" ?>" class="btn btn-primary">Add New Entry</a>                        
                        </div>
                    </section>
                </div>
                <?php
                include (ROOT_PATH.'/includes/footer.php')
                ?>
            </div>

        </div>
    </main>

</body>

</html>