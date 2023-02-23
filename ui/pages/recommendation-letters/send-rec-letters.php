<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Recommendation Letters</title>
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
                        <h3>Recommendation Letters</h3>
                    </div>
                    <section>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="align-middle">Check</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">ID/NO</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="d-flex justify-content-center">
                                        <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"></div>
                                    </td>
                                    <td>Elvin Smith</td>
                                    <td>35678912</td>
                                    <td><a href="#" class="btn btn-primary">Upload Recommendation Letter</a></td>
                                </tr>

                                <tr>
                                    <td class="d-flex justify-content-center">
                                        <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" check></div>
                                    </td>
                                    <td>Elvin Smith</td>
                                    <td>35678912</td>
                                    <td><a href="#" class="btn btn-primary">Upload Recommendation Letter</a></td>
                                </tr>

                                <tr>
                                    <td class="d-flex justify-content-center">
                                        <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"></div>
                                    </td>
                                    <td>Elvin Smith</td>
                                    <td>35678912</td>
                                    <td><a href="#" class="btn btn-primary">Upload Recommendation Letter</a></td>
                                </tr>

                                <tr>
                                    <td class="d-flex justify-content-center">
                                        <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" check></div>
                                    </td>
                                    <td>Elvin Smith</td>
                                    <td>35678912</td>
                                    <td><a href="#" class="btn btn-primary">Upload Recommendation Letter</a></td>
                                </tr>

                                <tr>
                                    <td class="d-flex justify-content-center">
                                        <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" check></div>
                                    </td>
                                    <td>Elvin Smith</td>
                                    <td>35678912</td>
                                    <td><a href="#" class="btn btn-primary">Upload Recommendation Letter</a></td>
                                </tr>

                                <tr>
                                    <td class="d-flex justify-content-center">
                                        <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"></div>
                                    </td>
                                    <td>Elvin Smith</td>
                                    <td>35678912</td>
                                    <td><a href="#" class="btn btn-primary">Upload Recommendation Letter</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="container text-right mb-3">
                            <button type="submit" class="btn btn-success">Send Letters</button>
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