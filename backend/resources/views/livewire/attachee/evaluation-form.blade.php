<div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-attachee-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <main id="main-content" class="mb-5">
                <div class="page-title">
                    <h2>Industrial Attachment Program Evaluation Form</h2>
                </div>
                <section>
                    <div>
                        <div class="p-3 rounded bg-info">
                            Please note that all students on industrial attachment are required to complete this
                            industrial
                            attachment evaluation form. The University will use the information obtained, together with
                            your constructive comments to improve the quality and effectiveness of the Program. Kindly
                            note that your responses will be anonymous and confidential.
                        </div>
                    </div>
                    <!-- Evaluation Form -->
                    <form class="mt-3 needs-validation" wire:submit.prevent="createEvaluation">
                        @csrf
                        <div class="container">
                            <h4>Details</h4>
                            <div class="mb-3 form-group">
                                <label for="course-being-pursued" class="form-label">Name of Course being
                                    pursued</label>
                                <input type="text" id="course-being-pursued" wire:model='course_being_pursued'
                                    class="form-control @error('course_being_pursued') is-invalid @enderror"
                                    value="{{ old('course_being_pursued') }}" required>
                                @error('course_being_pursued')
                                    <span class="invalid-feedback text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="department-attached" class="form-label">Department Attached</label>
                                <select class="form-select" id="department-attached" wire:model="department_attached">
                                    <option value={{ $attachee->department->id }}>
                                        {{ $attachee->department->name }}
                                    </option>
                                    @if ($departments->count() > 0)
                                        @foreach ($departments as $department)
                                            <option value={{ $department->id }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('department_attached')
                                    <span class="invalid-feedback text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="supervisor-name" class="form-label">Name of Departmental Supervisor</label>
                                <input type="text" id="supervisor-name" wire:model='supervisor_name'
                                    class="form-control @error('supervisor_name') is-invalid @enderror"
                                    value="{{ old('supervisor_name') }}" required>
                                @error('supervisor_name')
                                    <span class="invalid-feedback text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="level-of-study" class="form-label">Level of Study (tick appropriately
                                    below):</label>
                                <div id="level-of-study" class="@error('level_of_study') is-invalid @enderror">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" wire:model="level_of_study"
                                                value="masters">Masters
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" wire:model="level_of_study"
                                                value="bachelors">Bachelors
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" wire:model="level_of_study"
                                                value="diploma">Diploma
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" wire:model="level_of_study"
                                                value="certificate">Certificate
                                        </label>
                                    </div>
                                </div>
                                @error('level_of_study')
                                    <span class="invalid-feedback text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="attachment-duration" class="form-label">Duration of
                                    Attachment(weeks)</label>
                                <input type="number" id="attachment-duration" wire:model='attachment_duration'
                                    class="form-control @error('attachment_duration') is-invalid @enderror"
                                    value="{{ old('attachment_duration') }}" required>
                                @error('attachment_duration')
                                    <span class="invalid-feedback text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <h4>PART I: ORGANIZATIONAL ENVIRONMENT AND RESOURCES</h4>
                                <div class="p-3 rounded bg-info">
                                    Please select the extent to which you
                                    agree or disagree with the following statements regarding the environment in which
                                    you
                                    undertook your industrial attachment.
                                </div>
                                <ol>
                                    <li>
                                        <div class="form-group">
                                            <label for="part1-quiz1" class="form-label">
                                                {{ __('The department provided me with sufficient orientation to the University’s vision and mission.') }}</label>
                                            <div id="part1-quiz1" class="@error('part1_quiz.1') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.1" value=0>Strongly
                                                        Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.1" value=1>Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.1" value=2>Neither Agree
                                                        nor Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.1" value=3>Agree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.1" value=4>Strongly
                                                        Agree
                                                    </label>
                                                </div>
                                            </div>
                                            @error('part1_quiz.1')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="part1-quiz2" class="form-label">
                                                {{ __('The attachment setting helped me to effectively apply my classroom knowledge.') }}</label>
                                            <div id="part1-quiz2" class="@error('part1_quiz.2') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.2" value=0>Strongly
                                                        Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.2" value=1>Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.2" value=2>Neither
                                                        Agree
                                                        nor Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.2" value=3>Agree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.2" value=4>Strongly
                                                        Agree
                                                    </label>
                                                </div>
                                            </div>
                                            @error('part1_quiz.2')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="part1-quiz3" class="form-label">
                                                {{ __('I achieved my learning objectives through the attachment program.') }}</label>
                                            <div id="part1-quiz3" class="@error('part1_quiz.3') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.3" value=0>Strongly
                                                        Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.3" value=1>Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.3" value=2>Neither
                                                        Agree
                                                        nor Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.3" value=3>Agree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.3" value=4>Strongly
                                                        Agree
                                                    </label>
                                                </div>
                                            </div>
                                            @error('part1_quiz.3')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="part1-quiz4" class="form-label">
                                                {{ __('The department invited my feedback and input on the work in which I was engaged.') }}</label>
                                            <div id="part1-quiz4" class="@error('part1_quiz.4') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.4" value=0>Strongly
                                                        Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.4" value=1>Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.4" value=2>Neither
                                                        Agree
                                                        nor Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.4" value=3>Agree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.4" value=4>Strongly
                                                        Agree
                                                    </label>
                                                </div>
                                            </div>
                                            @error('part1_quiz.4')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="part1-quiz5" class="form-label">
                                                {{ __('The work I was engaged in was challenging and I feel my classroom learning was enriched.') }}</label>
                                            <div id="part1-quiz5" class="@error('part1_quiz.5') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.5" value=0>Strongly
                                                        Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.5" value=1>Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.5" value=2>Neither
                                                        Agree
                                                        nor Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.5" value=3>Agree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.5" value=4>Strongly
                                                        Agree
                                                    </label>
                                                </div>
                                            </div>
                                            @error('part1_quiz.5')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="part1-quiz6" class="form-label">
                                                {{ __("I have the ability to connect what I learnt in class to the ‘real world'.") }}</label>
                                            <div id="part1-quiz6" class="@error('part1_quiz.6') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.6" value=0>Strongly
                                                        Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.6" value=1>Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.6" value=2>Neither
                                                        Agree
                                                        nor Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.6" value=3>Agree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.6" value=4>Strongly
                                                        Agree
                                                    </label>
                                                </div>
                                            </div>
                                            @error('part1_quiz.6')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="part1-quiz7" class="form-label">
                                                {{ __('The University provided me with a variety of important and useful professional situations and activities that contributed to my learning.') }}</label>
                                            <div id="part1-quiz7"
                                                class="@error('part1_quiz.7') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.7" value=0>Strongly
                                                        Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.7" value=1>Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.7" value=2>Neither
                                                        Agree
                                                        nor Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.7" value=3>Agree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part1_quiz.7" value=4>Strongly
                                                        Agree
                                                    </label>
                                                </div>
                                            </div>
                                            @error('part1_quiz.7')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <h4 class="mt-3">PART II: DEPARTMENTAL SUPERVISOR</h4>
                                    <div class="p-3 rounded bg-info">
                                        Please select the extent to which you
                                        agree or disagree with the following statements regarding the University officer
                                        who supervised
                                        you while undertaking your industrial attachment.
                                    </div>
                                    <li>
                                        <div class="form-group">
                                            <label for="part2-quiz1" class="form-label">
                                                {{ __('My departmental supervisor clearly understood my needs as an attachee.') }}</label>
                                            <div id="part2-quiz1"
                                                class="@error('part2_quiz.1') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.1" value=0>Strongly
                                                        Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.1" value=1>Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.1" value=2>Neither Agree
                                                        nor Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.1" value=3>Agree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.1" value=4>Strongly
                                                        Agree
                                                    </label>
                                                </div>
                                            </div>
                                            @error('part2_quiz.1')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="part2-quiz2" class="form-label">
                                                {{ __('My departmental supervisor clearly described my tasks and responsibilities.') }}</label>
                                            <div id="part2-quiz2"
                                                class="@error('part2_quiz.2') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.2" value=0>Strongly
                                                        Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.2" value=1>Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.2" value=2>Neither
                                                        Agree
                                                        nor Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.2" value=3>Agree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.2" value=4>Strongly
                                                        Agree
                                                    </label>
                                                </div>
                                            </div>
                                            @error('part2_quiz.2')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="part2-quiz3" class="form-label">
                                                {{ __('My departmental supervisor assigned an appropriate amount of work.') }}</label>
                                            <div id="part2-quiz3"
                                                class="@error('part2_quiz.3') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.3" value=0>Strongly
                                                        Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.3" value=1>Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.3" value=2>Neither
                                                        Agree
                                                        nor Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.3" value=3>Agree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.3" value=4>Strongly
                                                        Agree
                                                    </label>
                                                </div>
                                            </div>
                                            @error('part2_quiz.3')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="part2-quiz4" class="form-label">
                                                {{ __('My departmental supervisor discussed with me, ways that I could best achieve my learning objectives.') }}</label>
                                            <div id="part2-quiz4"
                                                class="@error('part2_quiz.4') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.4" value=0>Strongly
                                                        Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.4" value=1>Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.4" value=2>Neither
                                                        Agree
                                                        nor Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.4" value=3>Agree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.4" value=4>Strongly
                                                        Agree
                                                    </label>
                                                </div>
                                            </div>
                                            @error('part2_quiz.4')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="part2-quiz5" class="form-label">
                                                {{ __('My departmental supervisor was willing to answer my questions regarding the work setting and my specific tasks.') }}</label>
                                            <div id="part2-quiz5"
                                                class="@error('part2_quiz.5') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.5" value=0>Strongly
                                                        Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.5" value=1>Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.5" value=2>Neither
                                                        Agree
                                                        nor Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.5" value=3>Agree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.5" value=4>Strongly
                                                        Agree
                                                    </label>
                                                </div>
                                            </div>
                                            @error('part2_quiz.5')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="part2-quiz6" class="form-label">
                                                {{ __('My departmental supervisor provided regular and helpful assessment of my performance and how to enhance it.') }}</label>
                                            <div id="part2-quiz6"
                                                class="@error('part2_quiz.6') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.6" value=0>Strongly
                                                        Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.6" value=1>Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.6" value=2>Neither
                                                        Agree
                                                        nor Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.6" value=3>Agree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.6" value=4>Strongly
                                                        Agree
                                                    </label>
                                                </div>
                                            </div>
                                            @error('part2_quiz.6')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group">
                                            <label for="part2-quiz7" class="form-label">
                                                {{ __('My departmental supervisor Taught me new knowledge and skills and demonstrated appropriate professional behaviour and values.') }}</label>
                                            <div id="part2-quiz7"
                                                class="@error('part2_quiz.7') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.7" value=0>Strongly
                                                        Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.7" value=1>Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.7" value=2>Neither
                                                        Agree
                                                        nor Disagree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.7" value=3>Agree
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="part2_quiz.7" value=4>Strongly
                                                        Agree
                                                    </label>
                                                </div>
                                            </div>
                                            @error('part2_quiz.7')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li class="mt-3">
                                        <div class="form-group">
                                            <label for="recommendable-to-friends" class="form-label">
                                                {{ __('Would you recommend JKUAT to your friends as an attachment option?') }}</label>
                                            <div id="recommendable-to-friends"
                                                class="@error('recommendable_to_friends') is-invalid @enderror">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="recommendable_to_friends" value=1>Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input"
                                                            wire:model="recommendable_to_friends" value=0>No
                                                    </label>
                                                </div>
                                            </div>
                                            @error('recommendable_to_friends')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group {{ $collapsible_class }} mb-3">
                                            <label for="reasons-if-not-recommendable"
                                                class="form-lable">{{ __('Please give reasons for your answer') }}.</label>
                                            <textarea class="mt-3 form-control @error('reasons_if_not_recommendable') is-invalid @enderror"
                                                id="reasons-if-not-recommendable" rows="6" wire:model='reasons_if_not_recommendable'></textarea>
                                            @error('reasons_if_not_recommendable')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group mb-3">
                                            <label for="recommendations"
                                                class="form-lable">{{ __('Please state any recommendations that you think may help improve the University’s industrial attachment program.') }}</label>
                                            <textarea class="mt-3 form-control @error('recommendations') is-invalid @enderror" id="recommendations"
                                                rows="6" wire:model='recommendations'></textarea>
                                            @error('recommendations')
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </li>
                                </ol>
                            </div>
                            <div class="d-flex justify-content-end align-items-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </section>
            </main>
            <x-footer />
        </div>

    </div>
    <x-notification-modal>
        <x-slot:title>
            {{ $feedback_header }}
        </x-slot:title>
        <x-slot:body class="{{ $alert_class }}">
            {{ $feedback }}
        </x-slot:body>
    </x-notification-modal>
    <script>
        window.addEventListener('action_feedback', (event) => {
            $("#notification-modal-btn").click();
        })
    </script>
</div>
