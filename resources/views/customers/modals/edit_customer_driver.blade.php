<div class="mb-5">
    <div class="mb-3">
        <label class="form-label" for="driver">Select Driver</label>
        <select id="driver" class="form-select" name="driver">
            <option value="" disabled>Choose Driver</option>
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}" {{ $driver->id == $vehicledriver->user_id ? 'selected' : '' }}>{{ $driver->full_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label" for="vehicle">Select Vehicle</label>
        <select id="vehicle" class="form-select" name="vehicle">
            <option value="" disabled>Choose Vehicle</option>
            @foreach ($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}" {{ $vehicle->id == $vehicledriver->vehicle_id ? 'selected' : '' }}>
                    {{ $vehicle->make }} ({{ $vehicle->license_plate }})</option>
            @endforeach
        </select>
    </div>
</div>

<input type="hidden" name="customer_id" value="{{ $vehicledriver->id }}">
<input type="hidden" name="id" value="{{ $id }}">

<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-outline-primary me-2" data-bs-dismiss="modal">Close</button>
    <button class="btn btn-primary" type="submit">
        <span class="indicator-label">Submit</span>
    </button>
</div>
