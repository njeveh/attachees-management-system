<?php
include '../../config.php';
include_once (ROOT_PATH.'/includes/header.php');
?>
<title>Profile</title>
</head>

<body>
    <main class="">
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php
            include (ROOT_PATH.'/includes/sidebar-nav.php')
            ?>

            <!-- Page Content  -->
            <div id="content">
                <?php
                include (ROOT_PATH.'/includes/navbar.php')
                ?>
                <div id="main-content">
                    <div class="page-title">
                       <h3>Profile</h3>
                    </div>
                    <section>
                    <form class="mt-3">
                        <!-- PERSONAL INFO -->
                        <div class="container">
                            <div class="mb-3">
                                <label for="nationalid" class="form-label">National Identification Number</label>
                                <input type="number" class="form-control" id="nationalid" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fname" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lname" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="institution" class="form-label">Institution</label>
                                <input type="text" class="form-control" id="institution" disabled>
                            </div>
                        </div>

                    <div class="container text-right mb-3">
                    <a href="<?php echo BASE_URL . "/pages/profile/edit-profile.php"?>" class="btn btn-primary">Edit Profile</a>
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