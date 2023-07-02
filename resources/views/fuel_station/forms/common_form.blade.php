@php
    $fuel_type = isset($fuelpump) ? $fuelpump->fuel_type : old('fuel_type');
@endphp

<div class="mb-3">
    <label class="form-label">Fuel Station Name <span class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control"
        value="{{ isset($fuelpump) ? $fuelpump->name : old('name') }}">
</div>
<div class="mb-3">
    <label class="form-label">Fuel Station Capacity <span class="text-danger">*</span></label>
    <input type="text" name="capacity" class="form-control"
        value="{{ isset($fuelpump) ? $fuelpump->capacity : old('capacity') }}">
</div>
<div class="mb-3">
    <label class="form-label">Phone <span class="text-danger">*</span></label>
    <input type="text" name="phone" class="form-control date-picker" id=""
        value="{{ isset($fuelpump) ? $fuelpump->phone : old('phone') }}">
</div>
<div class="mb-3">
    <label class="form-label">Email address <span class="text-danger">*</span></label>
    <input type="email" name="email" class="form-control"
        value="{{ isset($fuelpump) ? $fuelpump->email : old('email') }}">
</div>
<div class="mb-3">
    <label class="form-label">Franchiser Name<span class="text-danger">*</span></label>
    <input type="text" name="franchiser_name" class="form-control"
        value="{{ isset($fuelpump) ? $fuelpump->franchiser_name : old('franchiser_name') }}">
</div>
<div class="mb-3">
    <label class="form-label">Fuel Station Rate Per Liter <span class="text-danger">*</span></label>
    <input type="text" name="rate_per_liter" class="form-control"
        value="{{ isset($fuelpump) ? $fuelpump->rate_per_liter : old('rate_per_liter') }}">
</div>
<div class="mb-3">
    <label class="form-label">Address <span class="text-danger">*</span></label>
    <textarea placeholder="" name="address" class="form-control" rows="3" data-gramm="false" wt-ignore-input="true">{{ isset($fuelpump) ? $fuelpump->address : old('address') }} </textarea>
</div>
<div class="mb-3">
    <label class="form-label">Latitude <span class="text-danger">*</span></label>
    <input type="text" name="lat" class="form-control"
        value="{{ isset($fuelpump) ? $fuelpump->lat : old('lat') }}">
</div>
<div class="mb-3">
    <label class="form-label">Longitude <span class="text-danger">*</span></label>
    <input type="text" name="lng" class="form-control"
        value="{{ isset($fuelpump) ? $fuelpump->lng : old('lng') }}">
</div>
<div class="mb-3">
    <label class="form-label">Residential Address <span class="text-danger">*</span></label>
    <textarea placeholder="" name="residential_address" class="form-control" rows="3" data-gramm="false"
        wt-ignore-input="true"> {{ isset($fuelpump) ? $fuelpump->residential_address : old('residential_address') }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Notes <span class="text-danger">*</span></label>
    <textarea placeholder="" name="notes" class="form-control" rows="3" data-gramm="false" wt-ignore-input="true"> {{ isset($fuelpump) ? $fuelpump->notes : old('notes') }}</textarea>
</div>
<div class="mb-4">
    <label class="form-label d-block">Fuel Type <span class="text-danger">*</span></label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="fuel_type[]" id="inlineRadio1" value="petrol"
            {{ isset($fuelpump) ? ($fuelpump->is_petrol == 1 ? 'checked' : '') : '' }}>

        <label class="form-check-label" for="inlineRadio1">Petrol</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="fuel_type[]" id="inlineRadio2" value="diesel"
            {{  isset($fuelpump) ? ($fuelpump->is_diesel == 1 ? 'checked' : '') : '' }}>
        <label class="form-check-label" for="inlineRadio2">Diesel</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="fuel_type[]" id="inlineRadio2" value="hi_oct"
            {{  isset($fuelpump) ? ($fuelpump->is_hi_oct == 1 ? 'checked' : '') : '' }}>
        <label class="form-check-label" for="inlineRadio2">Hi-Octane</label>
    </div>
</div>


<div class="mb-3">
    <label class="form-label">Approval Certificate Picture<span class="text-danger">*</span></label>
    <input type="file" name="approval_certificate_image" class="form-control">
    @if (isset($fuelpump) && $fuelpump->approval_certificate_image != null)
        <div class="sh-15 me-1 mb-1 d-inline-block">
            <img src="{{ $fuelpump->approval_certificate_image_url }}" class="img-fluid-height rounded-md"
                alt="thumb">

        </div>
    @endif
</div>
<div class="mb-3">
    <label class="form-label">Upload Fuel Station Picture <span class="text-danger">*</span></label>
    <input type="file" name="fuel_station_image" class="form-control">
    @if (isset($fuelpump) && $fuelpump->fuel_station_image != null)
        <div class="sh-15 me-1 mb-1 d-inline-block">
            <img src="{{ $fuelpump->fuel_station_image_url }}" class="img-fluid-height rounded-md" alt="thumb">

        </div>
    @endif
</div>
<input type="hidden" name="service_provider" value="{{ $service_provider }}">
