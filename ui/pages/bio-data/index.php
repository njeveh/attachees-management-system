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
                       <h3>Bio-data</h3>
                    </div>
                    <section>
                    <form class="mt-3">
                        <!-- PERSONAL INFO -->
                        <div class="container">
                            <div class="mb-3">
                                <label for="dateOfBirth" class="form-label">Date Of Birth</label>
                                <input type="date" class="form-control" id="dateOfBirth" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" disabled>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
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
                            <textarea class="form-control" id="professionalSummary" rows="5"  disabled></textarea>
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

                        <!-- SKILLS -->
                        <div class="container">
                        <h4>Skills</h4>
                            <div class="row">
                                <p class="col">Lorem ipsum</p>
                                <p class="col">Lorem ipsum</p>
                            </div>
                            <div class="row">
                                <p class="col">Lorem ipsum</p>
                                <p class="col">Lorem ipsum</p>
                            </div>
                        </div>

                        
                    <div class="container text-right mb-3">
                    <a href="<?php echo BASE_URL . "/pages/bio-data/edit-bio-data.php"?>" class="btn btn-primary">Edit Bio-Data</a>
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