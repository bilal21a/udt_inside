<div class="mb-3">
    <label class="form-label">Modal <span class="text-danger">*</span></label>
    <input type="text" name="modal" class="form-control" value="{{ isset($vehicle_modal) ? $vehicle_modal->modal : old('modal') }}">
</div>
<div class="mb-3">
    <label class="form-label">Image <span class="text-danger">*</span></label>
    <input type="file" name="image" class="form-control">
    @if (isset($vehicle_modal) && $vehicle_modal->image_url != null)
        <div class="sh-15 me-1 mb-1 d-inline-block">
            <img src="{{ $vehicle_modal->image_url }}" class="img-fluid-height rounded-md" alt="thumb">
        </div>
    @endif
</div>
<div class="mb-3">
    <label class="form-label">Vehicle Make <span class="text-danger">*</span></label>
    <select name="vehicle_make_id" class="form-select">
        @foreach($vehicle_makes as $id => $make)
            <option value="{{ $id }}" {{ isset($vehicle_modal) && $vehicle_modal->vehicle_make_id == $id ? 'selected' : '' }}>{{ $make }}</option>
        @endforeach
    </select>
</div>
