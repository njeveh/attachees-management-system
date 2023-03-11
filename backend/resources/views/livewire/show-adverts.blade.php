<div>
    <div class="posts-wrapper d-flex">
        <div id="side-menu" class="side-menu {{ $side_menu_class }}">
            <div id="side-menu-collapse">
                <button type="button" wire:click="toggleClass()" class="btn-close m-2"></button>
            </div>
            <div class="pt-5">
                <div>
                    <p>Filter by departments</p>
                    <div class="">
                        @if ($department_objects->count() > 0)
                            @foreach ($department_objects as $department_object)
                                <div class="form-check">
                                    <input wire:model="departments.{{ $department_object->id }}"
                                        class="form-check-input" type="checkbox" value="{{ $department_object->id }}"
                                        id="flexCheckDefault-{{ $department_object->id }}">
                                    <label class="form-check-label" for="flexCheckDefault-{{ $department_object->id }}">
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

        </div>

        <section class="search-section posts-listing flex-grow-1 mx-4">
            <div class="search-form">
                <form action="" class="py-1 d-flex justify-content-center flex-wrap">
                    <div class="mx-2 my-1">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-home"></i></span>
                            <input wire:model="search" type="text" placeholder="Search">
                        </div>
                    </div>
                    <div class="college-filter mx-2 my-2">
                        <select class="form-select" id="styledSelect1" wire:model="department_id">
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
            <div class="">
                <div class="d-flex justify-content-start home-page-buttons">
                    <button type="button" wire:click="toggleClass()" class="btn btn-primary m-2">More
                        Filters</button>
                    <button type="reset" wire:click="resetFilters()" class="filters-reset m-2 btn btn-secondary">Reset
                        filters</button>
                </div>
                <div class="job-posts pe-3">
                    <h1 class="d-flex justify-content-center">Featured Opportunities</h1>
                    <div class="job-list">
                        @if ($adverts->count() > 0)
                            @foreach ($adverts as $advert)
                                <div class="job-item row">
                                    <div class="col-12 col-md-6 d-flex align-content-center justify-content-start my-2">
                                        <div class="d-flex flex-row align-content-start">
                                            <div class="organization-logo">
                                                <img src="/assets/static/logo.png" alt="logo">
                                            </div>
                                            <h5>{{ $advert->title }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 d-flex align-items-center justify-content-start my-2">
                                        <p class="sm-text">Application Deadline:
                                            {{ date_format($advert->created_at, 'd-M-Y') }}</p>
                                    </div>
                                    <div
                                        class="post-action col-12 col-md-2 d-flex align-items-center justify-content-start my-2">
                                        <a href="{{ '/adverts/' . $advert->id }}" class="btn btn-success">View</a>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="my-5"> {{ $adverts->links() }} </div> --}}
                        @else
                            <div class="d-flex justify-content-center">No Featured Opportunities Yet
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

{{-- 
$currentDate = date('Y-m-d');
$currentDate = date('Y-m-d', strtotime($currentDate));
   
$startDate = date('Y-m-d', strtotime("01/09/2019"));
$endDate = date('Y-m-d', strtotime("01/10/2019"));
   
if (($currentDate >= $startDate) && ($currentDate <= $endDate)){
    echo "Current date is between two dates";
}else{
    echo "Current date is not between two dates";  
} --}}
