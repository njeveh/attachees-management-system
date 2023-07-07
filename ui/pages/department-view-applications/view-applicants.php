<?php
include '../../config.php';
include (ROOT_PATH . '/includes/header.php')
?>
<title>Applicants</title>
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
                        <h3>Applicants</h3>
                    </div>
                    <section>
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td class="align-middle">Elvin</th>
                                    <td class="align-middle">Smith</td>
                                    <td class="align-middle">elvinsmith@gmail.com</td>
                                    <td class="align-middle">Pending</td>
                                    <td>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="#" class="btn btn-success w-100 mb-2">View Details</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="#" class="btn btn-primary w-100">Accept</a>
                                                </div>
                                                <div class="col">
                                                    <a href="#" class="btn btn-danger w-100">Reject</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td class="align-middle">Elvin</th>
                                    <td class="align-middle">Smith</td>
                                    <td class="align-middle">elvinsmith@gmail.com</td>
                                    <td class="align-middle">Pending</td>
                                    <td>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="#" class="btn btn-success w-100 mb-2">View Details</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="#" class="btn btn-primary w-100">Accept</a>
                                                </div>
                                                <div class="col">
                                                    <a href="#" class="btn btn-danger w-100">Reject</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td class="align-middle">Elvin</th>
                                    <td class="align-middle">Smith</td>
                                    <td class="align-middle">elvinsmith@gmail.com</td>
                                    <td class="align-middle">Pending</td>
                                    <td>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="#" class="btn btn-success w-100 mb-2">View Details</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="#" class="btn btn-primary w-100">Accept</a>
                                                </div>
                                                <div class="col">
                                                    <a href="#" class="btn btn-danger w-100">Reject</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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