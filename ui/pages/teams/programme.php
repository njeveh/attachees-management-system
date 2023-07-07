<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Team</title>
</head>

<body>
    <main class="">
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php
            include(ROOT_PATH . '/includes/sidebar-department.php')
            ?>
            <!-- Page Content  -->
            <div id="content">
                <?php
                include(ROOT_PATH . '/includes/navbar.php')
                ?>
                <div id="main-content">
                    <div class="page-title">
                        <h3>Team</h3>
                    </div>
                    <section>
                        <div class="mt-3">
                            <img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="JKUAT Logo" style="width: 30px" />
                            <span>ICT Directorate Attachment Opportunity</span>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <h4 class="card-title">Summary</h4>
                                <div class="container">
                                    <div class="card-text">No of Applicants: 10</div>
                                    <div class="card-text">Start Date: 12/03/2022</div>
                                    <div class="card-text">End Date: 12/05/2022</div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-body">
                                <h4 class="card-title">Description</h4>
                                <div class="container">
                                    <div class="card-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, laborum harum commodi animi deserunt incidunt consequuntur hic consequatur dolore architecto quaerat repellendus voluptatum deleniti nam cum. Et fugit doloribus qui perspiciatis necessitatibus esse, aspernatur non. Voluptas, soluta quia vitae tempora labore sunt voluptatum maiores voluptates nam possimus veritatis nisi dolorem!
                                    </div>
                                </div>
                            </div>
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