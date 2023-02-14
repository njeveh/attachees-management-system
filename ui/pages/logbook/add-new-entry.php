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
                        <h2>Logbook Entry</h2>
                    </div>
                    <section>
                        <form class="container mt-3">
                            <div class="mb-3">
                                <input type="date" class="form-control" id="currentDate">
                                <textarea class="mt-3 form-control" id="logbookEntry" rows="6"></textarea>
                            <div>
                            <div class="container text-right mb-3">
                            <button class="mt-3 btn btn-primary" type="submit">Add</button>                        
                            </div>
                        </form>
                    </section>
                </div>
                <?php
                include (ROOT_PATH.'/includes/footer.php')
                ?>
            </div>

        </div>
    </main>

    <script src="js/scripsts.js" async defer></script>
</body>

</html>