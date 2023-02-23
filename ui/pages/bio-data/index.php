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
                            <p class="disability-field">
                                Do you have any disability?
                            </p>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="has_disability">Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="has_disability">No
                                </label>
                            </div>
                            <p class="disability-field">If your answer above is Yes. Please specify your disability below</p>
                            <div class="mb-3">
                                <input type="text" class="mt-3 form-control" id="disability_type_input" name="disability_type"></input>
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
                                <textarea class="form-control" id="professionalSummary" rows="5"></textarea>
                            </div>


                            <!-- EDUCATION -->
                            <div class="container education">
                                <h4>Education</h4>
                                <div class="education-input-area" id="edu-container">
                                    <div class="row" id="0">
                                        <div class="mb-3 col">
                                            <label for="educationLevel-0" class="form-label">Level of Education</label>
                                            <input type="text" class="form-control" id="educationLevel-0" name="ed_levels[]" disabled>
                                        </div>

                                        <div class="mb-3 col">
                                            <label for="edstartDate-0" class="form-label">From</label>
                                            <input type="date" class="form-control" id="edstartDate-0" name="ed_start_dates[]" disabled>
                                        </div>

                                        <div class="mb-3 col">
                                            <label for="edendDate-0" class="form-label">To</label>
                                            <input type="date" class="form-control" id="edendDate-0" name="ed_end_dates[]" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="container text-right mb-3">
                                    <button class="btn btn-success" id="add-education-input-fields-btn" type="button">
                                        Add Education field
                                    </button>
                                </div>
                            </div>

                            <!-- SKILLS -->
                            <div class="container mb-5">
                                <h4>Skills</h4>
                                <div>
                                    <textarea class="form-control" id="skills" rows="5" disabled></textarea>
                                </div>
                            </div>
                            <!-- REFEREES -->

                            <div class="container">
                                <div class="mb-5">
                                    <h4>Referees</h4>
                                    <p>You are required to add atleast two referees</p>
                                </div>
                                <div id="ref-input-area">
                                    <div class="ref-input-block" id="0">
                                        <h5>Referee</h5>
                                        <div class="row">
                                            <div class="mb-3 col">
                                                <label for="refName-0" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="ref_names[]" id="refName-0">
                                            </div>
                                            <div class="mb-3 col">
                                                <label for="refRelationship-0" class="form-label">Relationship</label>
                                                <input type="text" class="form-control" name="ref_relationships[]" id="refRelationship-0">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col">
                                                <label for="refPhoneNumber-0" class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" name="ref_phone_numbers[]" id="refPhoneNumber-0">
                                            </div>
                                            <div class="mb-3 col">
                                                <label for="refEmail-0" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="ref_emails[]" id="refEmail-0">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col">
                                                <label for="refInstitution-0" class="form-label">Institution</label>
                                                <input type="text" class="form-control" name="ref_institutions[]" id="refInstitution-0">
                                            </div>
                                            <div class="mb-3 col">
                                                <label for="refPosition-0" class="form-label">Position in the Institution</label>
                                                <input type="text" class="form-control" name="ref_positions[]" id="refPosition-0">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="ref-input-block" id="1">
                                        <h5>Referee</h5>
                                        <div class="row">
                                            <div class="mb-3 col">
                                                <label for="refName-1" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="ref_names[]" id="refName-1">
                                            </div>
                                            <div class="mb-3 col">
                                                <label for="refRelationship-1" class="form-label">Relationship</label>
                                                <input type="text" class="form-control" name="ref_relationships[]" id="refRelationship-1">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col">
                                                <label for="refPhoneNumber-1" class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" name="ref_phone_numbers[]" id="refPhoneNumber-1">
                                            </div>
                                            <div class="mb-3 col">
                                                <label for="refEmail-1" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="ref_emails[]" id="refEmail-1">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col">
                                                <label for="refInstitution-1" class="form-label">Institution</label>
                                                <input type="text" class="form-control" name="ref_institutions[]" id="refInstitution-1">
                                            </div>
                                            <div class="mb-3 col">
                                                <label for="refPosition-1" class="form-label">Position in the Institution</label>
                                                <input type="text" class="form-control" name="ref_positions[]" id="refPosition-1">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="container text-right mb-3">
                                    <button class="btn btn-success" id="add-referee-input-fields-btn" type="button">
                                        Add Referee
                                    </button>
                                </div>
                            </div>

                            <div class="container text-right mb-3">
                                <a href="<?php echo BASE_URL . "/pages/bio-data/edit-bio-data.php" ?>" class="btn btn-primary">Edit Bio-Data</a>
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