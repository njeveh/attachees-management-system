<div>
    <header class="showcase">
        <div class="hero-text">
            <h1>Find Attachment Opportunites</h1>
        </div>
    </header>
    <section class="search-section">
        <div class="search-form">
            <form action="" class="py-3 d-flex justify-content-center flex-wrap">
                <div class="mx-2 my-2">
                    <input wire:model="search" type="text" placeholder="Search for attachment">
                </div>
                <div class="college-filter mx-2 my-2">
                    <select class="form-select" id="styledSelect1" wire:model="department">
                        <option value="0">
                            All departments
                        </option>
                        @if ($department_objects->count() > 0)
                            @foreach ($department_objects as $department_object)
                                <option value={{ $department_object->id }}>
                                    {{ $department_object->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </form>
        </div>
        <div class="container-fluid search-display">
            <div class="" style="display: flex;">
                <div class="box search-filters">
                    <div>
                        <p>Filter by departments</p>
                        <div class="school-filter-list">
                            @if ($department_objects->count() > 0)
                                @foreach ($department_objects as $department_object)
                                    <div class="form-check">
                                        <input wire:model="departments.{{ $department_object->id }}"
                                            class="form-check-input" type="checkbox"
                                            value="{{ $department_object->id }}" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $department_object->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div wire:click="resetFilters()" class="filters-reset">
                        <button type="reset">Reset filters</button>
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

{{-- $currentDate = date('Y-m-d');
$currentDate = date('Y-m-d', strtotime($currentDate));
   
$startDate = date('Y-m-d', strtotime("01/09/2019"));
$endDate = date('Y-m-d', strtotime("01/10/2019"));
   
if (($currentDate >= $startDate) && ($currentDate <= $endDate)){
    echo "Current date is between two dates";
}else{
    echo "Current date is not between two dates";  
} --}}
