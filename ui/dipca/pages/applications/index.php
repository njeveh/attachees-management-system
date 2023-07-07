<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
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

                    <section class="">
                        <div class="page-title">
                            <h2>Applications</h2>
                        </div>
                        <div class="display-box">
                            <form class="form-inline mb-2" action="/action_page.php">
                                <div class="form-group flex-column mr-2">
                                    <label for="department">Department:</label>
                                    <select class="form-control" id="department">
                                        <option>All departments</option>
                                        <option>Department 1</option>
                                        <option>Department 2</option>
                                        <option>Department 3</option>
                                        <option>Department 4</option>
                                    </select>
                                </div>
                                <div class="form-group flex-column mr-2">
                                    <label for="cohort">Cohort:</label>
                                    <select class="form-control" id="cohort">
                                        <option>All cohorts</option>
                                        <option>Cohort 1</option>
                                        <option>Cohort 2</option>
                                        <option>Cohort 3</option>
                                        <option>Cohort 4</option>
                                    </select>
                                </div>
                                <div class="form-group flex-column mr-2">
                                    <label for="year">Year:</label>
                                    <select class="form-control" id="year">
                                        <option>All</option>
                                        <option>2022/2023</option>
                                        <option>2021/2020</option>
                                        <option>2019/2020</option>
                                        <option>2018/2019</option>
                                    </select>
                                </div>
                            </form>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="custom-border" scope="col">Advert ref</th>
                                        <th class="custom-border" scope="col">Department</th>
                                        <th class="custom-border" scope="col">Cohort</th>
                                        <th class="custom-border" scope="col">Year</th>
                                        <th class="custom-border" scope="col">Declared vacancies</th>
                                        <th class="custom-border" scope="col">Number of Applications</th>
                                        <th class="custom-border" scope="col">Processed</th>
                                        <th class="custom-border" scope="col">Pending</th>
                                        <th class="custom-border" scope="col">Accepted</th>
                                        <th class="custom-border" scope="col">Rejected</th>
                                        <th class="custom-border" scope="col">Reported</th>
                                        <th class="custom-border" scope="col">Completed</th>
                                    </tr>
                                    <tr>

                                        <td>#1234</td>
                                        <td>ICT Directorate</td>
                                        <td>1</td>
                                        <td>2022/2023</td>
                                        <td>15</td>
                                        <td>10</td>
                                        <td>7</td>
                                        <td>3</td>
                                        <td>5</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>0</td>


                                    </tr>
                                    <tr>

                                        <td>#1234</td>
                                        <td>ICT Directorate</td>
                                        <td>1</td>
                                        <td>2022/2023</td>
                                        <td>15</td>
                                        <td>10</td>
                                        <td>7</td>
                                        <td>3</td>
                                        <td>5</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>0</td>


                                    </tr>
                                    <tr>

                                        <td>#1234</td>
                                        <td>ICT Directorate</td>
                                        <td>1</td>
                                        <td>2022/2023</td>
                                        <td>15</td>
                                        <td>10</td>
                                        <td>7</td>
                                        <td>3</td>
                                        <td>5</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>0</td>


                                    </tr>
                                    <tr>

                                        <td>#1234</td>
                                        <td>ICT Directorate</td>
                                        <td>1</td>
                                        <td>2022/2023</td>
                                        <td>15</td>
                                        <td>10</td>
                                        <td>7</td>
                                        <td>3</td>
                                        <td>5</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>0</td>


                                    </tr>
                                    <tr>

                                        <td>#1234</td>
                                        <td>ICT Directorate</td>
                                        <td>1</td>
                                        <td>2022/2023</td>
                                        <td>15</td>
                                        <td>10</td>
                                        <td>7</td>
                                        <td>3</td>
                                        <td>5</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>0</td>


                                    </tr>
                                </thead>
                                <tbody>

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