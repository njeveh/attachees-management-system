<?php
include '../../config.php';
include_once(ROOT_PATH . '/includes/header.php');
?>
<title>Applications</title>
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
                    <div class="page-title">
                        <h2>Attachment Application</h2>
                    </div>
                    <section>
                        <form class="mt-3 needs-validation" novalidate>
                            <div class="container">
                                <h4>Details</h4>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="institution" class="form-label">Institution</label>
                                    <input type="text" class="form-control" id="institution" disabled>
                                </div>

                                <div class="mb-3">
                                    <h4>Upload Documents</h4>
                                    <div class="mb-3">
                                        <label for="requestLetter" class="form-label">Request Letter</label>
                                        <input class="form-control" type="file" id="requestLetter" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="insuranceCover" class="form-label">Insurance Cover</label>
                                        <input class="form-control" type="file" id="insuranceCover" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="attachmentLetter" class="form-label">Attachment Letter</label>
                                        <input class="form-control" type="file" id="attachmentLetter" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nationalID" class="form-label">National ID</label>
                                        <input class="form-control" type="file" id="nationalID" required>
                                    </div>
                                </div>
                                <div class="container text-right mb-3">
                                    <button type="submit" class="btn btn-primary">Apply</button>
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