<div>
    <header class="showcase">
        <div class="hero-text">
            <h1>Find Attachment Opportunites</h1>
        </div>
    </header>
    <section class="search-section">
        <div class="search-form">
            <form action="">
                <div>
                    <input wire:model="search" type="text" placeholder="Search for attachment">
                </div>
                <div class="college-filter">
                    <label class="filter-dropdown" for="filter-drop">
                        <select class="" id="styledSelect1" name="department-options">
                            <option value="">
                                All departments
                            </option>
                            @if ($departments->count() > 0)
                                @foreach ($departments as $department)
                                    <option value={{ $department->name }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>

                    </label>
                </div>
            </form>
        </div>
        <div class="container-fluid search-display">
            <div class="" style="display: flex;">
                <div class="box search-filters">
                    <div>
                        <p>Filter by departments</p>
                        <div class="school-filter-list">
                            <?php for ($i = 0; $i < 15; $i++) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                </label>
                            </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="filters-reset">
                        <button>Reset filters</button>
                    </div>
                </div>
                <div class="content-display">
                    <div class="job-posts">
                        <h3 class="d-flex justify-content-center">Featured Opportunities</h3>
                        <div class="job-list">
                            @if ($adverts->count() > 0)
                                @foreach ($adverts as $advert)
                                    <div class="job-item">
                                        <div class="organization-details">
                                            <div class="organization-logo">
                                                <img src="/assets/static/logo.png" alt="logo">
                                            </div>
                                            <div>
                                                <p>{{ $advert->title }}</p>
                                                <p class="sm-text"><span>JKUAT</span><span>Juja</span></p>
                                            </div>
                                        </div>
                                        <div class="post-action">
                                            <a href="{{ '/adverts/' . $advert->id }}" class="btn btn-success">View</a>
                                            <a class="sm-text">{{ date_format($advert->created_at, 'd-M-Y') }}</a>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="my-5"> {{ $adverts->links() }} </div> --}}
                            @else
                                <div class="d-flex justify-content-center">No Featured Opportunities Yet</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
