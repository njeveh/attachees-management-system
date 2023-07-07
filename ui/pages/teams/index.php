<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Teams</title>
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
                        <h3>Teams</h3>
                    </div>
                    <section>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Cohort</th>
                                    <th scope="col">year</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>3</td>
                                    <td>2022/2023</td>
                                    <td>Active</td>
                                    <td>
                                        <button class="btn btn-primary">
                                            View members
                                        </button>
                                        <button class="btn btn-success">
                                            Send notification
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>2022/2023</td>
                                    <td>Active</td>
                                    <td>
                                        <button class="btn btn-primary">
                                            View members
                                        </button>
                                        <button class="btn btn-success">
                                            Send notification
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>2022/2023</td>
                                    <td>Completed</td>
                                    <td>
                                        <button class="btn btn-primary">
                                            View members
                                        </button>
                                        <button class="btn btn-success">
                                            Send notification
                                        </button>
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