<?php
include '../../config.php';
include(ROOT_PATH . '/includes/header.php')
?>
<title>Confirm reporting</title>
</head>

<body>
    <main class="">
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php
            include(ROOT_PATH . '/includes/sidebar-department.php')
            ?>
            <!-- Page Content  -->
            <div id="content">
                <?php
                include(ROOT_PATH . '/includes/navbar.php')
                ?>
                <div id="main-content">
                    <div class="page-title">
                        <h3>Confirm attachee reporting</h3>
                    </div>
                     <div class="container search-area">
                        <form class="form-inline my-4" action="/action_page.php">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                    </div>
                    <section>
                        <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">ID Number</th>
                                    <th scope="col">Institution</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td class="align-middle">Elvin Smith</th>
                                    <td class="align-middle">36789317</td>
                                    <td class="align-middle">JKUAT</td>
                                    <td>
                                        <button type="button" class="btn btn-success w-100 mb-2">Report</button>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td class="align-middle">Elvin Smith</th>
                                    <td class="align-middle">36789317</td>
                                    <td class="align-middle">JKUAT</td>
                                    <td>
                                        <button type="button" class="btn btn-success w-100 mb-2">Report</button>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td class="align-middle">Elvin Smith</th>
                                    <td class="align-middle">36789317</td>
                                    <td class="align-middle">JKUAT</td>
                                    <td>
                                        <button type="button" class="btn btn-success w-100 mb-2">Report</button>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td class="align-middle">Elvin Smith</th>
                                    <td class="align-middle">36789317</td>
                                    <td class="align-middle">JKUAT</td>
                                    <td>
                                        <button type="button" class="btn btn-success w-100 mb-2">Report</button>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>   
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