<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Update Advert</title>
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
                        <h3>Update Advert</h3>
                    </div>
                    <section>
                        <form class="mt-3 needs-validation" novalidate>
                            <!-- New Advert -->
                            <div class="container">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" required disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" rows="5" required disabled></textarea>
                                </div>
                                <div class="form-group flex-column mb-3">
                                    <label for="advert-year">Year:</label>
                                    <select class="form-control" id="advert-year" disabled>
                                        <option>2022/2023</option>
                                        <option>2023/2024</option>
                                    </select>
                                </div>
                                <h4>No. of vacancies</h4>

                                <div class="mb-3">
                                    <label for="cohort-1-vacancies" class="form-label">Cohort 1</label>
                                    <input type="number" class="form-control" id="cohort-1-vacancies" required disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="cohort-2-vacancies" class="form-label">Cohort 2</label>
                                    <input type="number" class="form-control" id="cohort-2-vacancies" required disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="cohort-3-vacancies" class="form-label">Cohort 3</label>
                                    <input type="number" class="form-control" id="cohort-3-vacancies" required disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="cohort-4-vacancies" class="form-label">Cohort 4</label>
                                    <input type="number" class="form-control" id="cohort-4-vacancies" required disabled>
                                </div>

                                <div class="text-right mb-3">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
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