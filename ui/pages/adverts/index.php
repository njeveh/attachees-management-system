<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Adverts</title>
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
                        <h3>Adverts</h3>
                    </div>
                    <section>
                        <table class="table table-hover">
                            <thead>
                                <tr>

                                    <th scope="col">Title</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Vacancies</th>
                                    <th scope="col">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><span><img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="JKUAT Logo" style="width: 30px" /></span><span class="ml-2">Network Administration Attachment Opportunity</span></th>
                                    <td>2022/2023</td>
                                    <td>10</td>
                                    <td>
                                        <a href="./view-advert.php" class="btn btn-primary w-100 mb-2">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><span><img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="JKUAT Logo" style="width: 30px" /></span><span class="ml-2">Network Administration Attachment Opportunity</span></th>
                                    <td>2022/2023</td>
                                    <td>10</td>
                                    <td>
                                        <a href="./view-advert.php" class="btn btn-primary w-100 mb-2">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><span><img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="JKUAT Logo" style="width: 30px" /></span><span class="ml-2">Network Administration Attachment Opportunity</span></th>
                                    <td>2022/2023</td>
                                    <td>10</td>
                                    <td>
                                        <a href="./view-advert.php" class="btn btn-primary w-100 mb-2">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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