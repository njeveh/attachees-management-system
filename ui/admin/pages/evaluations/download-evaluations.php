<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Download Evaluations</title>
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
                            <h2>Download Evaluations</h2>
                        </div>
                        <div class="download-form-container">
                            <div class="form-group">
                                <label for="cohort">Cohort:</label>
                                <input type="text" class="form-control" id="cohort">
                            </div>
                            <div class="form-group">
                                <label for="department">Department:</label>
                                <select class="form-control" id="department">
                                    <option>Department 1</option>
                                    <option>Department 2</option>
                                    <option>Department 3</option>
                                    <option>Department 4</option>
                                </select>
                            </div>
                            <div class="container text-right mb-3">
                                <button type="submit" class="btn btn-primary">Download</button>
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