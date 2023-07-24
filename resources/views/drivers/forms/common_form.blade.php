@php
    $gender = isset($user) ? $user->gender : old('gender');
    @endphp
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Driver First Name <span class="text-danger">*</span></p>
    <input type="text" name="first_name" class="form-control" value="{{ isset($user) ? $user->first_name : old('first_name') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Driver Middle Name <span class="text-danger">*</span></p>
    <input type="text" name="middle_name" class="form-control" value="{{ isset($user) ? $user->middle_name : old('middle_name') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Driver Last Name <span class="text-danger">*</span></p>
    <input type="text" name="last_name" class="form-control" value="{{ isset($user) ? $user->last_name : old('last_name') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Phone <span class="text-danger">*</span></p>
    <input type="text" name="phone" class="form-control date-picker" id="" value="{{ isset($user) ? $user->phone : old('phone') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Driver Email address <span class="text-danger">*</span></p>
    <input type="email" name="email" class="form-control" value="{{ isset($user) ? $user->email : old('email') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Password @if(!isset($user)) <span class="text-danger">*</span> @endif</p>
    <input type="text" name="password" class="form-control" value="{{ old('password') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">License No. <span class="text-danger">*</span></p>
    <input type="text" name="license_no" class="form-control" value="{{ isset($user) ? $user->driver_info->license_no : old('license_no') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">License Issue Date</p>
    <input type="text" class="form-control" name="license_issue_date" value="{{ isset($user) ? $user->driver_info->license_issue_date : old('license_issue_date') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">License Expiry Date</p>
    <input type="text" class="form-control" name="license_exp_date" value="{{ isset($user) ? $user->driver_info->license_exp_date : old('license_exp_date') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Profile Image <span class="text-danger">*</span></p>
    <input type="file" name="profile_image" class="form-control">
    @if (isset($user) && $user->profile_image != null)
    <div class="sh-15 me-1 mb-1 d-inline-block">
        <img src="{{ asset($user->profile_url) }}" class="img-fluid-height rounded-md" alt="thumb">
    </div>
    @endif
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Driver License (Front) <span class="text-danger">*</span></p>
    <input type="file" name="license_img_front" class="form-control">
    @if (isset($user) && $user->driver_info->license_img_front != null)
    <div class="sh-15 me-1 mb-1 d-inline-block">
        <img src="{{ asset("storage/driver/license_front/".$user->driver_info->license_img_front) }}" class="img-fluid-height rounded-md" alt="thumb">
    </div>
    @endif
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Driver License (Back) <span class="text-danger">*</span></p>
    <input type="file" name="license_img_back" class="form-control">
    @if (isset($user) && $user->driver_info->license_img_back != null)
    <div class="sh-15 me-1 mb-1 d-inline-block">
        <img src="{{ asset("storage/driver/license_back/".$user->driver_info->license_img_back) }}" class="img-fluid-height rounded-md" alt="thumb">
    </div>
    @endif
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Driver Address <span class="text-danger">*</span></p>
    <input placeholder="" name="address" class="form-control" rows="3" data-gramm="false" wt-ignore-input="true" value="{{ isset($user) ? $user->address : old('address') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Gender <span class="text-danger">*</span></p>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" {{ $gender == 'Male' ? 'checked' : '' }}>
        <label class="form-check-label" for="male">Male</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ $gender == 'Female' ? 'checked' : '' }}>
        <label class="form-check-label" for="female">Female</label>
    </div>
</div>

<input type="hidden" name="customer" value="{{ $customer_id }}">