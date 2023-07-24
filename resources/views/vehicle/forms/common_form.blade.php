@php
    $gender = isset($user) ? $user->gender : old('gender');
@endphp
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Vehicle Make <span class="text-danger">*</span></p>
    <input type="text" name="make" class="form-control" value="{{ isset($vehicle) ? $vehicle->make : old('make') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Vehicle Color <span class="text-danger">*</span></p>
    <input type="text" name="color" class="form-control date-picker" id="" value="{{ isset($vehicle) ? $vehicle->color : old('color') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Vehicle Model <span class="text-danger">*</span></p>
    <input type="text" name="model" class="form-control" value="{{ isset($vehicle) ? $vehicle->model : old('model') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Vehicle Engine Type <span class="text-danger">*</span></p>
    <input type="text" name="engine_type" class="form-control" value="{{ isset($vehicle) ? $vehicle->engine_type : old('engine_type') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Vehicle Year <span class="text-danger">*</span></p>
    <input type="text" name="year" class="form-control" value="{{ isset($vehicle) ? $vehicle->year : old('year') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Average (KM Per Gallon) <span class="text-danger">*</span></p>
    <input type="text" name="avg_kmpg" class="form-control" value="{{ isset($vehicle) ? $vehicle->avg_kmpg : old('avg_kmpg') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">License Plate <span class="text-danger">*</span></p>
    <input type="text" name="license_plate" class="form-control" value="{{ isset($vehicle) ? $vehicle->license_plate : old('license_plate') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">License No. <span class="text-danger">*</span></p>
    <input type="text" name="license_no" class="form-control" value="{{ isset($vehicle) ? $vehicle->license_no : old('license_no') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">How Long You Have Owned The Vehicle? <span class="text-danger">*</span></p>
    <input type="text" class="form-control" name="vehicle_owning_time" value="{{ isset($vehicle) ? $vehicle->vehicle_owning_time : old('vehicle_owning_time') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">What is Your Current Estimated Car Value</p>
    <input type="text" class="form-control" name="current_car_value" value="{{ isset($vehicle) ? $vehicle->current_car_value : old('current_car_value') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">How Many Kilometer Will This Car Travels Over Next 12 Months</p>
    <input type="number" class="form-control" name="car_travel_distance" value="{{ isset($vehicle) ? $vehicle->car_travel_distance : old('car_travel_distance') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Vehicle Status <span class="text-danger">*</span></p>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" {{ isset($vehicle) ? ($status == '1' ? 'checked' : '') : '' }}>
        <label class="form-check-label" for="inlineRadio1">Active</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" {{ isset($vehicle) ? ($status == '0' ? 'checked' : '') : '' }}>
        <label class="form-check-label" for="inlineRadio2">Inactive</label>
    </div>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Vehicle Image <span class="text-danger">*</span></p>
    <input type="file" name="vehicle_image" class="form-control">
    @if (isset($vehicle) && $vehicle->vehicle_image != null)
        <div class="sh-15 me-1 mb-1 d-inline-block">
            <img class="rounded float-start" width="200px" src="{{ $vehicle->vehicle_image_url }}" alt="Vehicle Image">
        </div>
    @endif
</div>

<input type="hidden" name="customer" value="{{ $customer_id }}">
