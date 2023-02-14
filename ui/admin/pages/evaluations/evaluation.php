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

                    <section class="evaluations-section">
                        <div class="page-title">
                            <h2>Evaluation #001</h2>
                        </div>
                        <div>
                            <p>Attachee Name: John Doe</p>
                            <p>Course Pursued: Bsc. Computer Science</p>
                            <p>Level of Study: Bachelors</p>
                            <p>Department Attached: ICT Directorate</p>
                            <p>Supervisor Name: John Doe</p>
                            <p>Duration: 8 weeks</p>
                        </div>
                        <div class="display-box">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="custom-border" scope="col">No.</th>
                                        <th class="custom-border" scope="col">Evaluation Item</th>
                                        <th class="custom-border" scope="col">Attachee Response</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan='3' class="table-subheading">PART I: ORGANIZATIONAL ENVIRONMENT AND RESOURCES</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>The department provided me with sufficient orientation to the University’s vision and mission.</td>
                                        <td>Agree</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>The attachment setting helped me to effectively apply my classroom knowledge.</td>
                                        <td>Agree</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>I achieved my learning objectives through the attachment program.</td>
                                        <td>Agree</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>The department invited my feedback and input on the work in which I was engaged.</td>
                                        <td>Agree</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>The work I was engaged in was challenging and I feel my classroom learning was enriched.</td>
                                        <td>Agree</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>I have the ability to connect what I learnt in class to the ‘real world&#39;.</td>
                                        <td>Agree</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>The University provided me with a variety of important and useful professional situations and
                                            activities that contributed to my learning.</td>
                                        <td>Agree</td>
                                    </tr>
                                    <tr>
                                        <th colspan='3' class="table-subheading">PART II: DEPARTMENTAL SUPERVISOR</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>My departmental supervisor clearly understood my needs as an attachee.</td>
                                        <td>Agree</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>My departmental supervisor clearly described my tasks and responsibilities.</td>
                                        <td>Agree</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td>My departmental supervisor assigned an appropriate amount of work.</td>
                                        <td>Agree</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">11</th>
                                        <td>My departmental supervisor discussed with me, ways that I could best achieve my learning objectives.</td>
                                        <td>Agree</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">12</th>
                                        <td>My departmental supervisor was willing to answer my questions regarding the work setting and my specific tasks.</td>
                                        <td>Agree</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">13</th>
                                        <td>My departmental supervisor provided regular and helpful assessment of my performance and how to enhance it.</td>
                                        <td>Agree</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">14</th>
                                        <td>My departmental supervisor Taught me new knowledge and skills and demonstrated appropriate professional
                                            behaviour and values.
                                        </td>
                                        <td>Agree</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">15</th>
                                        <td>Would you recommend JKUAT to your friends as an attachment option?
                                        </td>
                                        <td>No</td>
                                    </tr>
                                    <tr>
                                        <th colspan='3'>Reasons if no:</th>
                                    </tr>
                                    <tr>
                                        <td colspan='3' id="reason">Lorem ipsum dolor sit amet. A dolorem maxime et iusto iure ex assumenda assumenda rem nihil exercitationem qui neque voluptatem. Ut aspernatur amet non quisquam enim qui velit internos sit iusto delectus.

                                            Aut quam magnam non autem laborum et officia accusamus sit rerum quae hic error dolorem est animi omnis. Eos odio voluptatibus ut facilis dolor id dolorem dolor ut excepturi galisum sed voluptas alias. Qui suscipit corporis et facilis nihil et veritatis exercitationem sit placeat atque.

                                            Qui saepe Quis non sunt sapiente 33 maxime commodi ex voluptates sapiente ut dicta eligendi est pariatur cumque sed corporis laudantium. Est natus blanditiis ab animi laborum ut obcaecati deleniti ut consequatur Quis?</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="mt-5">
                                <h4>Recommendations</h4>
                                <p>Lorem ipsum dolor sit amet. Qui assumenda natus est veniam optio et velit tenetur est dolor iusto est quia libero ea fugiat magni. Sed quos Quis aut corrupti dolorum non aspernatur autem non enim voluptatem. Aut animi incidunt aut totam consequatur sit accusantium exercitationem id maxime assumenda est laborum cupiditate</p>
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