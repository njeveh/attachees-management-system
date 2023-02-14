<?php
include '../../config.php';
include_once(ROOT_PATH . '/includes/header.php');
?>
<title>Evaluation</title>
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
                        <h2>Industrial Attachment Program Evaluation Form</h2>
                    </div>
                    <section>
                        <div>
                            <p class="evaluation-instructions">
                                Please note that all students on industrial attachment are required to complete this industrial
                                attachment evaluation form. The University will use the information obtained, together with
                                your constructive comments to improve the quality and effectiveness of the Program. Kindly
                                note that your responses will be anonymous and confidential.
                            </p>
                        </div>
                        <!-- Evaluation Form -->
                        <form class="mt-3 needs-validation" novalidate>
                            <div class="container">
                                <h4>Details</h4>
                                <div class="mb-3">
                                    <label for="course_name" class="form-label">Name of Course being pursued</label>
                                    <input type="text" class="form-control" id="course_name" required disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="department" class="form-label">Department Attached</label>
                                    <input type="text" class="form-control" id="department" required disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="supervisor" class="form-label">Name of Departmental Supervisor</label>
                                    <input type="text" class="form-control" id="supervisor" required disabled>
                                </div>
                                <div>Level of Study (tick appropriately below):</div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="level_of_study">Masters
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="level_of_study">Bachelors
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="level_of_study">Diploma
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="level_of_study">Certificate
                                    </label>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="duration" class="form-label">Duration of Attachment</label>
                                    <input type="text" class="form-control" id="duration" disabled>
                                </div>

                                <div class="mb-3">
                                    <h4>PART I: ORGANIZATIONAL ENVIRONMENT AND RESOURCES</h4>
                                    <p class="evaluation-instructions">
                                        Please select the extent to which you
                                        agree or disagree with the following statements regarding the environment in which you
                                        undertook your industrial attachment.
                                    </p>
                                    <ol>
                                        <li>
                                            <p class="evaluation-field">
                                                The department provided me with sufficient orientation to the University’s vision and mission.
                                            </p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="orientation">Strongly Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="orientation">Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="orientation">Neither Agree nor Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="orientation">Agree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="orientation">Strongly Agree
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <p class="evaluation-field">
                                                The attachment setting helped me to effectively apply my classroom knowledge.
                                            </p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="knowledge_applied">Strongly Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="knowledge_applied">Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="knowledge_applied">Neither Agree nor Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="knowledge_applied">Agree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="knowledge_applied">Strongly Agree
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <p class="evaluation-field">
                                                I achieved my learning objectives through the attachment program.
                                            </p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="objectives_achieved">Strongly Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="objectives_achieved">Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="objectives_achieved">Neither Agree nor Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="objectives_achieved">Agree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="objectives_achieved">Strongly Agree
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <p class="evaluation-field">
                                                The department invited my feedback and input on the work in which I was engaged.
                                            </p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="feedback_and_input_invited">Strongly Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="feedback_and_input_invited">Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="feedback_and_input_invited">Neither Agree nor Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="feedback_and_input_invited">Agree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="feedback_and_input_invited">Strongly Agree
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <p class="evaluation-field">
                                                The work I was engaged in was challenging and I feel my classroom learning was enriched.
                                            </p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="classroom_learning_enriched">Strongly Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="classroom_learning_enriched">Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="classroom_learning_enriched">Neither Agree nor Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="classroom_learning_enriched">Agree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="classroom_learning_enriched">Strongly Agree
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <p class="evaluation-field">
                                                I have the ability to connect what I learnt in class to the ‘real world&#39;.
                                            </p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="real_world_connectable">Strongly Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="real_world_connectable">Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="real_world_connectable">Neither Agree nor Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="real_world_connectable">Agree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="real_world_connectable">Strongly Agree
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <p class="evaluation-field">
                                                The University provided me with a variety of important and useful professional situations and
                                                activities that contributed to my learning.
                                            </p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="sufficiently_engaged">Strongly Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="sufficiently_engaged">Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="sufficiently_engaged">Neither Agree nor Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="sufficiently_engaged">Agree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="sufficiently_engaged">Strongly Agree
                                                </label>
                                            </div>
                                        </li>
                                        <h4 class="mt-3">PART II: DEPARTMENTAL SUPERVISOR</h4>
                                        <p class="evaluation-instructions">
                                            Please select the extent to which you
                                            agree or disagree with the following statements regarding the University officer who supervised
                                            you while undertaking your industrial attachment.
                                        </p>
                                        <li>
                                            <p class="evaluation-field">My departmental supervisor clearly understood my needs as an attachee.</p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="needs_understood">Strongly Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="needs_understood">Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="needs_understood">Neither Agree nor Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="needs_understood">Agree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="needs_understood">Strongly Agree
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <p class="evaluation-field">
                                                My departmental supervisor clearly described my tasks and responsibilities.
                                            </p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="responsibilities_clearly_defined">Strongly Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="responsibilities_clearly_defined">Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="responsibilities_clearly_defined">Neither Agree nor Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="responsibilities_clearly_defined">Agree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="responsibilities_clearly_defined">Strongly Agree
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <p class="evaluation-field">
                                                My departmental supervisor assigned an appropriate amount of work.
                                            </p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="appropriate_work_assigned">Strongly Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="appropriate_work_assigned">Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="appropriate_work_assigned">Neither Agree nor Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="appropriate_work_assigned">Agree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="appropriate_work_assigned">Strongly Agree
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <p class="evaluation-field">
                                                My departmental supervisor discussed with me, ways that I could best achieve my learning objectives.
                                            </p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="learning_objectives_discussed">Strongly Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="learning_objectives_discussed">Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="learning_objectives_discussed">Neither Agree nor Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="learning_objectives_discussed">Agree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="learning_objectives_discussed">Strongly Agree
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <p class="evaluation-field">
                                                My departmental supervisor was willing to answer my questions regarding the work setting and my specific tasks.
                                            </p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="questions_answered">Strongly Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="questions_answered">Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="questions_answered">Neither Agree nor Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="questions_answered">Agree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="questions_answered">Strongly Agree
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <p class="evaluation-field">
                                                My departmental supervisor provided regular and helpful assessment of my performance and how to enhance it.
                                            </p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="helpful_assessment_provided">Strongly Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="helpful_assessment_provided">Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="helpful_assessment_provided">Neither Agree nor Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="helpful_assessment_provided">Agree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="helpful_assessment_provided">Strongly Agree
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <p class="evaluation-field">
                                                My departmental supervisor Taught me new knowledge and skills and demonstrated appropriate professional
                                                behaviour and values.
                                            </p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="new_knowledge_acquired">Strongly Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="new_knowledge_acquired">Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="new_knowledge_acquired">Neither Agree nor Disagree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="new_knowledge_acquired">Agree
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="new_knowledge_acquired">Strongly Agree
                                                </label>
                                            </div>
                                        </li>
                                        <li class="mt-3">
                                            <p class="evaluation-field">
                                                Would you recommend JKUAT to your friends as an attachment option?
                                            </p>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="recommendable">Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="recommendable">No
                                                </label>
                                            </div>
                                            <p class="evaluation-field">If your answer to no. 15 above is NO. Please give reasons for your answer</p>
                                            <div class="mb-3">
                                                <textarea class="mt-3 form-control" id="unrecommendable_reason_input" rows="6"></textarea>
                                            </div>
                                        </li>
                                        <li>
                                            <p class="evaluation-field">Please state any recommendations that you think may help improve the University’s
                                                industrial attachment program.
                                            </p>
                                            <div class="mb-3">
                                                <textarea class="mt-3 form-control" id="unrecommendable_reason_input" rows="6"></textarea>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                                <div class="container text-right mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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