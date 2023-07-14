<div class="mb-3">
    <label class="form-label">Make <span class="text-danger">*</span></label>
    <input type="text" name="make" class="form-control" value="{{ isset($vehicle_make) ? $vehicle_make->make : old('make') }}">
</div>
<div class="mb-3">
    <label class="form-label">Logo Image <span class="text-danger">*</span></label>
    <input type="file" name="image" class="form-control">
    @if (isset($vehicle_make) && $vehicle_make->image_url != null)
        <div class="sh-15 me-1 mb-1 d-inline-block">
            <img src="{{ $vehicle_make->image_url }}" class="img-fluid-height rounded-md" alt="thumb">

        </div>
    @endif
</div>
