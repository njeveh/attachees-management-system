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
                            <h2>Send Mail</h2>
                        </div>
                        <div class="advert-details">
                            <div style="display: flex; flex-direction:row; align-items:center; margin:0 0 20px 20px;">
                                <img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="Logo" style="height: 40px; width:40px; margin-right:20px;">
                                <input type="text" name="" id="" value="ICT Directorate Attachment" style="font-size:1.1rem;" readonly>
                            </div>
                        </div>
                        <div class="email-card">
                            <h5>Accepted Applicants Mail</h5>
                            <div class="mb-3 container">
                                <label for="fname" class="form-label">Subject :</label>
                                <input type="text" class="form-control" id="subject" >
                            </div>
                            <div class="mb-3 container">
                                <p>Body :</p>
                                <textarea class="form-control" id="professionalSummary" rows="5" required></textarea>
                            </div>
                            <div class="mb-3 container letter-preview">
                                <h5 style="margin-left: 0;">Acceptance Letter :</h5>
                                <p>Select Letter :</p>
                                <div style="display: flex;">
                                    <select name="" id="">
                                        <option value="">-- Letter Name --</option>
                                        <option value="">Acceptance letter</option>
                                    </select>
                                    <a href="" class="action-button" style="background-color: var(--primary-color); margin-left:10px;">Preview</a>
                                </div>
                            </div>
                        </div>
                        <div class="email-card">
                            <h5>Rejected Applicants Mail</h5>
                            <div class="mb-3 container">
                                <label for="fname" class="form-label">Subject :</label>
                                <input type="text" class="form-control" id="subject" >
                            </div>
                            <div class="mb-3 container">
                                <p>Body :</p>
                                <textarea class="form-control" id="professionalSummary" rows="5" required></textarea>
                            </div>
                            <div class="mb-3 container letter-preview">
                                <h5 style="margin-left: 0;">Regret Letter :</h5>
                                <p>Select Letter :</p>
                                <div style="display: flex;">
                                    <select name="" id="">
                                        <option value="">-- Letter Name --</option>
                                        <option value="">Acceptance letter</option>
                                    </select>
                                    <a href="" class="action-button" style="background-color: var(--primary-color); margin-left:10px;">Preview</a>
                                </div>                            </div>
                        </div>
                        <div style="display: flex; justify-content:flex-end;">
                            <button class="action-button" style="border: none;">Send Mail</button>
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