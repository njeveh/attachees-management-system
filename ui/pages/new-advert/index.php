<?php
include '../../config.php';
include (ROOT_PATH . '/includes/header.php')
?>
<title>New Advert</title>
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
                        <h3>New Advert</h3>
                    </div>
                    <section>
                    <form class="mt-3 needs-validation" novalidate>
                            <!-- New Advert -->
                            <div class="container">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" required>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" rows="5" required></textarea>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="startDate" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="startDate" required>
                                    </div>

                                    <div class="mb-3 col">
                                        <label for="endDate" class="form-label">EndDate</label>
                                        <input type="date" class="form-control" id="endDate" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="title" class="form-label">Application Deadline</label>
                                    <input type="date" class="form-control" id="deadlineDate" required>
                                </div>

                                <div class="mb-3">
                                    <label for="vacancies" class="form-label">No. of Vacancies</label>
                                    <input type="number" class="form-control" id="deadlineDate" required>
                                </div>

                                <div class="text-right mb-3">
                                    <button class="btn btn-primary" type="submit">Submit</button>                        
                                </div>
                            </div>
                    </form>   
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