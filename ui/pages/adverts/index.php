<?php
include '../../config.php';
include (ROOT_PATH . '/includes/header.php')
?>
<title>Adverts</title>
</head>

<body>
    <main class="">
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php
            include (ROOT_PATH.'/includes/sidebar-department.php')
            ?>
            <!-- Page Content  -->
            <div id="content">
                <?php
                include (ROOT_PATH.'/includes/navbar.php')
                ?>
                <div id="main-content">
                    <div class="page-title">
                        <h3>Adverts</h3>
                    </div>
                    <section>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Vacancies</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row"><span><img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="JKUAT Logo" style="width: 30px" /></span><span class="ml-2">Network Administration Attachment Opportunity</span></th>
                                    <td>05/01/2023</td>
                                    <td>30/03/2023</td>
                                    <td>10</td>
                                    </tr>
                                    <tr>
                                    <th scope="row"><span><img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="JKUAT Logo" style="width: 30px" /></span><span class="ml-2">Systems Development Attachment Opportunity</span></th>
                                    <td>01/09/2022</td>
                                    <td>31/12/2022</td>
                                    <td>5</td>
                                    </tr>
                                    <tr>
                                    <th scope="row"><span><img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="JKUAT Logo" style="width: 30px" /></span><span class="ml-2">User/Systems Support Attachment Opportunity</span></th>
                                    <td>01/09/2022</td>
                                    <td>31/12/2022</td>
                                    <td>6</td>
                                    </tr>
                                </tbody>
                            </table>   
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