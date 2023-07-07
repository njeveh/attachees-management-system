<div class="offcanvas offcanvas-start" id="demo">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title">Heading</h1>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div class="box search-filters">
            <div>
                <p>Filter by departments</p>
                <div class="school-filter-list">
                    @if ($department_objects->count() > 0)
                        @foreach ($department_objects as $department_object)
                            <div class="form-check">
                                <input wire:model="departments.{{ $department_object->id }}" class="form-check-input"
                                    type="checkbox" value="{{ $department_object->id }}" id="flexCheckDefault">
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
    </div>
</div>
