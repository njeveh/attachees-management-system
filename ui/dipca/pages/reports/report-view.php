<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Report</title>
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

                    <section class="evaluations-section">
                        <div class="page-title">
                            <h2>Quarterly Progress Reporting Tool On Internal Attachment</h2>
                        </div>
                        <div class="display-box">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="custom-border" scope="col">ATTACHEE NAME</th>
                                        <th class="custom-border" scope="col">CONTACT</th>
                                        <th class="custom-border" scope="col">ID/NO</th>
                                        <th class="custom-border" scope="col">SEX</th>
                                        <th class="custom-border" scope="col">PWDS</th>
                                        <th class="custom-border" scope="col">INSTITUTION</th>
                                        <th class="custom-border" scope="col">SECTION ATTACHED</th>
                                        <th class="custom-border" scope="col">AREA OF STUDY</th>
                                        <th class="custom-border" scope="col">LEVEL OF EDUCATION</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>0700000000</td>
                                        <td>35122617</td>
                                        <td>M</td>
                                        <td>NO</td>
                                        <td>JKUAT</td>
                                        <td>Ict Directorate</td>
                                        <td>Computer Science</td>
                                        <td>Degree</td>
                                        <td><button type="button" class="btn btn-success">View Acceptance Letter</button></td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>0700000000</td>
                                        <td>35122617</td>
                                        <td>M</td>
                                        <td>NO</td>
                                        <td>JKUAT</td>
                                        <td>Ict Directorate</td>
                                        <td>Computer Science</td>
                                        <td>Degree</td>
                                        <td><button type="button" class="btn btn-success">View Acceptance Letter</button></td>

                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>0700000000</td>
                                        <td>35122617</td>
                                        <td>M</td>
                                        <td>NO</td>
                                        <td>JKUAT</td>
                                        <td>Ict Directorate</td>
                                        <td>Computer Science</td>
                                        <td>Degree</td>
                                        <td><button type="button" class="btn btn-success">View Acceptance Letter</button></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="container text-right mb-3">
                            <button type="button" class="btn btn-primary m-2">Download Report</button>
                            <button type="button" class="btn btn-primary m-2">Download Acceptance Letters</button>
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