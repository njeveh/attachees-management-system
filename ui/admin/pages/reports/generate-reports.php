<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Generate Reports</title>
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

                    <section class="download-section">
                        <div class="page-title">
                            <h2>Generate Reports</h2>
                        </div>
                        <div class="download-form-container">
                            <div class="form-group">
                                <label for="cohort">Cohort:</label>
                                <select class="form-control" id="cohort">
                                    <option>All cohorts</option>
                                    <option>Cohort 1</option>
                                    <option>Cohort 2</option>
                                    <option>Cohort 3</option>
                                    <option>Cohort 4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="year">Year:</label>
                                <input type="text" class="form-control" id="year">
                            </div>
                            <div class="form-group">
                                <label for="department">Department:</label>
                                <select class="form-control" id="department">
                                    <option>All departments</option>
                                    <option>Department 1</option>
                                    <option>Department 2</option>
                                    <option>Department 3</option>
                                    <option>Department 4</option>
                                </select>
                            </div>
                            <div class="container text-right mb-3">
                                <a href='./report-view.php' class="btn btn-primary">Generate</a>
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