<?php
include '../../config.php';
include_once(ROOT_PATH . '/includes/header.php');
?>
<title>Profile</title>
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
                        <h3>Edit bio data</h3>
                    </div>
                    <section>
                        <form class="mt-3 needs-validation" novalidate>
                            <!-- PERSONAL INFO -->
                            <div class="container">
                                <div class="mb-3">
                                    <label for="dateOfBirth" class="form-label">Date Of Birth</label>
                                    <input type="date" class="form-control" id="dateOfBirth" required>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" id="phone" required>
                                </div>
                            </div>

                            <!-- EMERGENCY CONATCT -->
                            <div class="mt-3">
                                <div class="container">
                                    <h4>Emergency Contact</h4>
                                    <div class="row">
                                        <div class="mb-3 col">
                                            <label for="emergencyName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="emergencyName" required>
                                        </div>

                                        <div class="mb-3 col">
                                            <label for="relationship" class="form-label">Relationship</label>
                                            <input type="text" class="form-control" id="relationship" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 container">
                                    <label for="emergencyPhone" class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" id="emergencyPhone" required>
                                </div>
                            </div>

                            <!-- PROFESSIONAL SUMMARY -->
                            <div class="mb-3 container">
                                <h4>Professional Summary</h4>
                                <textarea class="form-control" id="professionalSummary" rows="5" required></textarea>
                            </div>

                            <!-- WORK HISTORY -->
                            <div class="container">
                                <h4>Work History</h4>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="jobTitle" class="form-label">Job Title</label>
                                        <input type="text" class="form-control" id="jobTitle" required>
                                    </div>

                                    <div class="mb-3 col">
                                        <label for="startDate" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="startDate" required>
                                    </div>

                                    <div class="mb-3 col">
                                        <label for="endDate" class="form-label">EndDate</label>
                                        <input type="date" class="form-control" id="endDate" required>
                                    </div>
                                </div>
                            </div>

                            <!-- EDUCATION -->
                            <div class="container">
                                <h4>Education</h4>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="educationLevel" class="form-label">Level of Education</label>
                                        <input type="text" class="form-control" id="educationLevel" required>
                                    </div>

                                    <div class="mb-3 col">
                                        <label for="edstartDate" class="form-label">From</label>
                                        <input type="date" class="form-control" id="edstartDate" required>
                                    </div>

                                    <div class="mb-3 col">
                                        <label for="edendDate" class="form-label">To</label>
                                        <input type="date" class="form-control" id="edendDate" required>
                                    </div>
                                </div>
                            </div>

                            <!-- SKILLS -->
                            <div class="container mb-3">
                                <h4>Skills</h4>
                                <label for="skills" class="form-label">Skills</label>
                                <input type="text" class="form-control" id="skills" required>
                            </div>


                            <div class="container text-right mb-3">
                                <button class="btn btn-primary" type="submit">Update</button>
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