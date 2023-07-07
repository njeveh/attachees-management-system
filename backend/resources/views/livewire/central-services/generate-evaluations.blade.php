<div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <x-central-services-side-nav-links />
        <!-- Page Content  -->
        <div id="content">
            <x-navbar />
            <div id="main-content">

                <section class="">
                    <div class="page-title">
                        <h2>Download Evaluations</h2>
                    </div>
                    <x-loading-state-indicators />

                    @if (session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="m-3">
                        <form wire:submit.prevent="exportCSVFile">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="cohort">Cohort:</label>
                                <select class="form-select" id="cohort" wire:model='cohort'>
                                    <option value="">All cohorts</option>
                                    <option value="1">Cohort 1</option>
                                    <option value="2">Cohort 2</option>
                                    <option value="3">Cohort 3</option>
                                    <option value="4">Cohort 4</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="year">Year:</label>
                                <select class="form-select" id="year" wire:model="year">
                                    <option value="">All</option>
                                    @for ($year = date('Y'); $year > 2022; --$year)
                                        <option value="{{ $year }}/{{ $year + 1 }}">
                                            {{ $year }}/{{ $year + 1 }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="department">Department:</label>
                                <select class="form-select" id="department" wire:model='department'>
                                    <option value="">All departments</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col form-group mb-3">
                                    <label for="file-name">Save as (enter the name you would wish the file to be saved
                                        as):</label>
                                    <input type="text" wire:model='file_name' id="file-name" class="form-control"
                                        placeholder="Enter a valid file name" required>
                                </div>
                                <div class="col form-group mb-3">
                                    <label for="file-extension">File extension:</label>
                                    <select class="form-select" id="file-extension" wire:model='file_extension'>
                                        <option value="xlsx">xlsx</option>
                                        <option value="csv">csv</option>
                                        <option value="xls">xls</option>
                                        <option value="xml">xml</option>
                                        <option value="ods">ods</option>
                                        <option value="csv">csv</option>
                                        <option value="xlsm">xlsm</option>
                                        <option value="html">html</option>
                                        <option value="htm">htm</option>
                                        <option value="xltx">xltx</option>
                                        <option value="xltm">xltm</option>
                                        <option value="ots">ots</option>
                                        <option value="xlt">xlt</option>
                                        <option value="slk">slk</option>
                                        <option value="gnumeric">gnumeric</option>
                                        <option value="xltm">xltm</option>
                                        <option value="tsv">tsv</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end align-items-center m-3">
                                <button type="submit" class="btn btn-primary">Download</button>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
            <x-footer />
        </div>

    </div>
</div>
