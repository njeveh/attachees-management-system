<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Departments</title>
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
                    
                    <section class="notifications-section">
                        <div class="page-title">
                            <h2>Department Details</h2>
                        </div>
                        <div class="">
                        <div class="container">
                                <div class="mb-3">
                                    <label for="fname" class="form-label">Department Name</label>
                                    <input type="text" class="form-control" id="fname" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="lname" class="form-label">Department Head</label>
                                    <input type="text" class="form-control" id="lname" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="institution" class="form-label">Number of Posts</label>
                                    <input type="text" class="form-control" id="institution" disabled>
                                </div>
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