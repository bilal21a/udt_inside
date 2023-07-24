<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Make <span class="text-danger">*</span></p>
    <input type="text" name="make" class="form-control" value="{{ isset($vehicle_make) ? $vehicle_make->make : old('make') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Logo Image <span class="text-danger">*</span></p>
    <input type="file" name="image" class="form-control">
    @if (isset($vehicle_make) && $vehicle_make->image_url != null)
        <div class="sh-15 me-1 mb-1 d-inline-block">
            <img class="rounded float-start mt-2" width="200px" src="{{ $vehicle_make->image_url  }}" alt="Service Provider">        </div>
    @endif
</div>


