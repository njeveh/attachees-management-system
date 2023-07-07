<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Title</title>
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

                    <section class="">
                        <div class="page-title">
                            <h2>Header</h2>
                        </div>
                        <div>
                            <div>
                            Show 10 entries
                            </div>
                            <div>Search for advert</div>
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