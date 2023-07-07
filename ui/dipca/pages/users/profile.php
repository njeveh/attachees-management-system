<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Dashboard</title>
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
                            <h2>User Profile Information</h2>
                        </div>
                        <div class="">
                            <!-- PERSONAL INFO -->
                            <div class="container">
                                <div class="mb-3">
                                    <label for="fname" class="form-label">User's First Name</label>
                                    <input type="text" class="form-control" id="fname" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="lname" class="form-label">User's Last Name</label>
                                    <input type="text" class="form-control" id="lname" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">User's Email</label>
                                    <input type="email" class="form-control" id="email" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="institution" class="form-label">Institution</label>
                                    <input type="text" class="form-control" id="institution" disabled>
                                </div>
                            </div>
                            <div class="container">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">User's Phone Number</label>
                                    <input type="number" class="form-control" id="phone" disabled>
                                </div>
                            </div>

                            <!-- EMERGENCY CONATCT -->
                            <div class="mt-3">
                                <div class="container">
                                    <h4>Emergency Contact</h4>
                                    <div class="row">
                                        <div class="mb-3 col">
                                            <label for="emergencyName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="emergencyName" disabled>
                                        </div>

                                        <div class="mb-3 col">
                                            <label for="relationship" class="form-label">Relationship</label>
                                            <input type="text" class="form-control" id="relationship" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 container">
                                    <label for="emergencyPhone" class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" id="emergencyPhone" disabled>
                                </div>
                            </div>

                            <!-- PROFESSIONAL SUMMARY -->
                            <div class="mb-3 container">
                                <h4>Professional Summary</h4>
                                <textarea class="form-control" id="professionalSummary" rows="5" disabled></textarea>
                            </div>

                            <!-- WORK HISTORY -->
                            <div class="container">
                                <h4>Work History</h4>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="jobTitle" class="form-label">Job Title</label>
                                        <input type="text" class="form-control" id="jobTitle" disabled>
                                    </div>

                                    <div class="mb-3 col">
                                        <label for="startDate" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="startDate" disabled>
                                    </div>

                                    <div class="mb-3 col">
                                        <label for="endDate" class="form-label">EndDate</label>
                                        <input type="date" class="form-control" id="endDate" disabled>
                                    </div>
                                </div>
                            </div>

                            <!-- EDUCATION -->
                            <div class="container">
                                <h4>Education</h4>
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="educationLevel" class="form-label">Level of Education</label>
                                        <input type="text" class="form-control" id="educationLevel" disabled>
                                    </div>

                                    <div class="mb-3 col">
                                        <label for="edstartDate" class="form-label">From</label>
                                        <input type="date" class="form-control" id="edstartDate" disabled>
                                    </div>

                                    <div class="mb-3 col">
                                        <label for="edendDate" class="form-label">To</label>
                                        <input type="date" class="form-control" id="edendDate" disabled>
                                    </div>
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