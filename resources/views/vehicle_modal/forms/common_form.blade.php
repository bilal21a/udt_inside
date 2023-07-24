<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Modal <span class="text-danger">*</span></p>
    <input type="text" name="modal" class="form-control"
        value="{{ isset($vehicle_modal) ? $vehicle_modal->modal : old('modal') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Image <span class="text-danger">*</span></p>
    <input type="file" name="image" class="form-control">
    @if (isset($vehicle_modal) && $vehicle_modal->image_url != null)
        <div class="sh-15 me-1 mb-1 d-inline-block">
            <img class="rounded float-start mt-2 ms-1" width="200px" src="{{ $vehicle_modal->image_url }}"
                alt="Service Provider">
        </div>
    @endif
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Vehicle Make <span class="text-danger">*</span></p>
    <select name="vehicle_make_id" class="form-select">
        @foreach ($vehicle_makes as $id => $make)
            <option value="{{ $id }}"
                {{ isset($vehicle_modal) && $vehicle_modal->vehicle_make_id == $id ? 'selected' : '' }}>
                {{ $make }}</option>
        @endforeach
    </select>
</div>
