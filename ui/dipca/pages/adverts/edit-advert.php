<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Adverts</title>
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

                    <section class="">
                        <div class="page-title">
                            <h2>Edit Advert</h2>
                        </div>
                        <div class="advert-details">
                            <div>
                                <div style="display: flex; flex-direction:row; align-items:center; justify-content:space-between;">
                                    <h5>Title : </h5>
                                </div>
                                <div style="display: flex; flex-direction:row; align-items:center; margin:0 0 20px 20px;">
                                    <img src="<?php echo BASE_URL . "/assets/static/logo.png" ?>" alt="Logo" style="height: 40px; width:40px; margin-right:20px;">
                                    <input type="text" name="" id="" value="ICT Directorate Attachment" style="font-size:1.1rem; box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px; background-color:white;">
                                </div>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <h5>Post Details: </h5>
                                <div style="display:flex; flex-direction:row; padding: 0 20px">
                                    <div style="flex: 1;">
                                        <p>Start Date: <span><input type="date" value="12/12/2020" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;background-color:white;"></span></p>
                                        <p>End Date: <span><input type="date" value="12/12/2020" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;background-color:white;"></span></p>
                                    </div>
                                    <div style="flex: 1;">
                                        <p>Application Deadline : <span><input type="date" value="12/12/2020" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;background-color:white;"></span></p>
                                        <p>Number of Vacancies: <span><input type="number" value="50" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;background-color:white;"></span></p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h5>Description : </h5>
                                <div class="advert-view">
                                    <textarea name="" id="">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Provident hic facere ad? Eius beatae nisi voluptatibus voluptates deserunt, pariatur consectetur
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio illo unde aut nam atque.
                                        Possimus repellendus blanditiis amet hic,
                                        reprehenderit ex animi alias cumque repudiandae corporis
                                        excepturi consectetur sequi voluptate?
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit dicta dolorem vitae
                                        tempore enim, repellat perferendis commodi, repellendus iste numquam cupiditate
                                        aliquid rerum fuga nihil quidem placeat corporis ipsa aperiam.
                                    </p>
                                    <br>
                                    <p>Requirements</p>
                                    <br>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fuga molestiae, alias nostrum expedita hic perspiciatis
                                        est a pariatur fugit ad in aliquid itaque! Illum magnam id exercitationem praesentium ipsam!</p>
                                    <br>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, quae animi
                                        velit alias quo cupiditate temporibus unde illum! Ab non quis perferendis in culpa modi quidem numquam voluptas sed saepe.</p>

                                    <p>Responsibilities of the Intern</p><br>
                                    • The intern will demonstrate motivated participation in the learning experience.<br>
                                    • The intern will participate in the orientation programs of the organization and abide by all terms and conditions as set out in the internship agreement.<br>
                                    • At the end of the assignment, the intern will provide a full report demonstrating learning and achievements during the internship as guided by supervisor.<br>

                                    <p>Professional Requirements</p><br>
                                    • Students pursuing post graduate studies from reputable national, regional or international universities studying disciplines relevant to the work of the Save the Children International.<br>
                                    • Young professionals, on completion of at least undergraduate degree, who have not yet entered the formal employment arena.<br>
                                    • Should be available on full time for the duration of the programme.<br>
                                    • For Finance, in addition to a first degree, candidates should be either fully qualified CPA/ACCA or studying for the final part of either of the two courses.<br>

                                    <p>Personal Attributes</p><br>
                                    • A high degree of self-motivation, positive attitude, drive and the ability to contribute to a multi-cultural, team-based work environment.<br>
                                    • Strong networking capacity and excellent interpersonal skills.<br>
                                    • Ability to multitask; work flexibly, creatively and under pressure in response to needs or changing demands.<br>
                                    • Extremely well organized.<br>
                                    • Highest ethical standards.<br>

                                    <p>How to Apply</p><br>

                                    Please apply in English saving your CV and Motivation letter as a single document indicating the area you are interested in and the location. To apply, please visit our website at https://kenya..net/. The deadline for receiving applications is 15th February 2022. Only shortlisted applicants will be considered for interview.<br>
                                
                                    </textarea>
                                </div>
                            </div>
                            <div style="display:flex; flex-direction:row; justify-content:flex-end; margin: 20px 0; padding-right:20px;">
                                <button class="action-button" style="border: none; margin-left:20px;">Save</button>
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