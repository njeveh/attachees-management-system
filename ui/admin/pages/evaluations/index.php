<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Evaluations</title>
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
                            <h2>Attachee Evaluations</h2>
                        </div>
                        <div class="filter-forms">
                            <div class="form-group evaluations-filter mr-5">
                                <label for="cohort">Search by Cohort:</label>
                                <input type="text" class="form-control" id="cohort" placeholder="Search...">
                            </div>
                            <div class="form-group evaluations-filter ml-5">
                                <label for="department">Filter by Department:</label>
                                <select class="form-control" id="department">
                                    <option>Department 1</option>
                                    <option>Department 2</option>
                                    <option>Department 3</option>
                                    <option>Department 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="display-box">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="custom-border" scope="col">Cohort</th>
                                        <th class="custom-border" scope="col">Department</th>
                                        <th class="custom-border" scope="col">Attachee Name</th>
                                        <th class="custom-border" scope="col">Supervisor Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>ICT DIRECTORATE</td>
                                        <td>John Doe</td>
                                        <td>John Doe</td>
                                        <td class="actions">
                                            <a class="action-button" href="<?php echo BASE_URL . "/admin/pages/evaluations/evaluation.php" ?>">View</a>
                                            <button>
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>ICT DIRECTORATE</td>
                                        <td>John Doe</td>
                                        <td>John Doe</td>
                                        <td class="actions">
                                            <a class="action-button" href="<?php echo BASE_URL . "/admin/pages/evaluations/evaluation.php" ?>">View</a>
                                            <button>
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>ICT DIRECTORATE</td>
                                        <td>John Doe</td>
                                        <td>John Doe</td>
                                        <td class="actions">
                                            <a class="action-button" href="<?php echo BASE_URL . "/admin/pages/evaluations/evaluation.php" ?>">View</a>
                                            <button>
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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