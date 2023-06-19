@php
    $gender = isset($user) ? $user->gender : old('gender');
@endphp

<div class="mb-3">
    <label class="form-label">Allocated Driver Name <span class="text-danger">*</span></label>
    <input type="text" name="first_name" class="form-control"
        {{-- value="{{ isset($user) ? $user->first_name : old('first_name') }}" --}}
        >
</div>
<div class="mb-3">
    <label class="form-label">Vehicle Make <span class="text-danger">*</span></label>
    <input type="text" name="make" class="form-control"
        {{-- value="{{ isset($vehicle) ? $vehicle->make : old('make') }}" --}}
        >
</div>
<div class="mb-3">
    <label class="form-label">Vehicle Color <span class="text-danger">*</span></label>
    <input type="text" name="color" class="form-control date-picker" id=""
        {{-- value="{{ isset($vehicle) ? $vehicle->color : old('color') }}" --}}
        >
</div>
<div class="mb-3">
    <label class="form-label">Vehicle Model <span class="text-danger">*</span></label>
    <input type="email" name="model" class="form-control"
    {{-- value="{{ isset($vehicle) ? $vehicle->model : old('model') }}" --}}
    >
</div>
<div class="mb-3">
    <label class="form-label">Vehicle Engine Type
         {{-- @if(!isset($vehicle))  --}}
         <span class="text-danger">*</span>
         {{-- @endif --}}
        </label>
    <input type="text" name="engine_type" class="form-control"
        {{-- value="{{ old('engine_type') }}" --}}
        >
</div>

<div class="mb-3">
    <label class="form-label">Vehicle Year <span class="text-danger">*</span></label>
    <input type="text" name="year" class="form-control"
     {{-- value="{{ isset($vehicle) ? $vehicle->year : old('year') }}" --}}
     >
</div>
<div class="mb-3">
    <label class="form-label">Average (KM Per Gallon) <span class="text-danger">*</span></label>
    <input type="text" name="avg_kmpg" class="form-control"
    {{-- value="{{ isset($vehicle) ? $vehicle->avg_kmpg : old('avg_kmpg') }}" --}}
    >
</div>
<div class="mb-3">
    <label class="form-label">License Plate <span class="text-danger">*</span></label>
    <input type="text" name="license_plate" class="form-control"
    {{-- value="{{ isset($vehicle) ? $vehicle->no_plate : old('no_plate') }}" --}}
    >
</div>
<div class="mb-3">
    <label class="form-label">License No. <span class="text-danger">*</span></label>
    <input type="text" name="license_no" class="form-control" value="{{ isset($driver) ? $driver->license_no : old('license_no') }}">
</div>
<div class="mb-3">
        <label class="form-label">License Expiry Date</label>
        <input type="date" class="form-control" name="license_exp_date"  value="{{ isset($driver) ? $driver->driver_info->license_exp_date : old('license_exp_date') }}">
</div>
<div class="mb-4">
    <label class="form-label d-block">Vehicle Status <span class="text-danger">*</span></label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1"
            {{-- {{ $status == 'Active' ? 'checked' : '' }} --}}
            >
        <label class="form-check-label" for="inlineRadio1">Active</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0"
            {{-- {{ $status == 'Inactive' ? 'checked' : '' }} --}}
            >
        <label class="form-check-label" for="inlineRadio2">Inactive</label>
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Vehicle Image <span class="text-danger">*</span></label>
    <input type="file" name="vehicle_image" class="form-control">
    @if (isset($vehicle) && $vehicle->vehicle_image != null)
        <div class="sh-15 me-1 mb-1 d-inline-block">
            <img src="{{ asset($vehicle->vehicle_image) }}" class="img-fluid-height rounded-md" alt="thumb">

        </div>
    @endif
</div>
