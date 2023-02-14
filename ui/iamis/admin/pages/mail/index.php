<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Mail</title>
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

                    <section class="mail-section">
                        <div class="page-title">
                            <h2>Mail Applicants</h2>
                        </div>
                        <div class="mail-applicants-display" style="margin-left: 20px;">
                            <div class="mail-applicants-display-programme">
                                <div class="attachment-program">
                                    <p>Select Programme :</p>
                                    <div>
                                        <img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="logo">
                                        <select name="" id="">
                                            <option value="">--Select Programme--</option>
                                            <option value="">ICT Directorate Attachment Opportunity</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="send-letters-btn">
                                    <a href="<?php echo BASE_URL . "/admin/pages/mail/mail.php" ?>" class="action-button">Send Mail</a>
                                </div>
                            </div>
                            <div class="application-summary">
                                <h5>Attachment Programme Summary</h5>
                                <div class="application-summary-details">
                                    <div class="summary-details">
                                        <div class="s-detail">
                                            <div>
                                                <p>Number of applicants :</p>
                                            </div>
                                            <div class="summary-input"><p>10</p></div>
                                        </div>
                                        <div class="s-detail">
                                            <div>
                                                <p>Accepted Applicants :</p>
                                            </div>
                                            <div class="summary-input"><p>10</p></div>
                                        </div>
                                        <div class="s-detail">
                                            <div>
                                                <p>Rejected Applicants :</p>
                                            </div>
                                            <div class="summary-input"><p>10</p></div>
                                        </div>
                                        <div class="s-detail">
                                            <div>
                                                <p>Pending Applications :</p>
                                            </div>
                                            <div class="summary-input"><p>10</p></div>
                                        </div>
                                    </div>
                                    <div class="summary-details">
                                        <div class="s-detail">
                                            <div>
                                                <p>Vacancies Posted :</p>
                                            </div>
                                            <div class="summary-input"><p>10</p></div>
                                        </div>
                                        <div class="s-detail">
                                            <div>
                                                <p>Start Date :</p>
                                            </div>
                                            <div class="summary-input"><p>10/20/2020</p></div>
                                        </div>
                                        <div class="s-detail">
                                            <div>
                                                <p>End Date :</p>
                                            </div>
                                            <div class="summary-input"><p>10/20/2020</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="">
                        <div class="page-title">
                            <h5>Applicants List</h5>
                        </div>
                        <div class="display-box applicants-list" >
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="custom-border" scope="col">Name</th>
                                        <th class="custom-border" scope="col">Email</th>
                                        <th class="custom-border" scope="col">Institution</th>
                                        <th class="custom-border" scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">James May</th>
                                        <td>jamesmay@gmail.com</td>
                                        <td>MMU</td>
                                        <td>Pending</td>
                                        <td><a class="action-button" href="">View Profile</a></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Richard Hammond</th>
                                        <td>jamesmay@gmail.com</td>
                                        <td>MMU</td>
                                        <td>Pending</td>
                                        <td><a class="action-button" href="">View Profile</a></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Jeremy Clarkson</th>
                                        <td>jamesmay@gmail.com</td>
                                        <td>MMU</td>
                                        <td>Pending</td>
                                        <td><a class="action-button" href="">View Profile</a></td>
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