@php
    $gender = isset($user) ? $user->gender : old('gender');
@endphp
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">First Name <span class="text-danger">*</span></p>
    <input type="text" name="first_name" class="form-control"
        value="{{ isset($user) ? $user->first_name : old('first_name') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Last Name <span class="text-danger">*</span></p>
    <input type="text" name="last_name" class="form-control"
        value="{{ isset($user) ? $user->last_name : old('last_name') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Phone <span class="text-danger">*</span></p>
    <input type="text" name="phone" class="form-control date-picker" id=""
        value="{{ isset($user) ? $user->phone : old('phone') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Email address <span class="text-danger">*</span></p>
    <input type="email" name="email" class="form-control" value="{{ isset($user) ? $user->email : old('email') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Password @if (!isset($user))
            <span class="text-danger">*</span>
        @endif
    </p>
    <input type="text" name="password" class="form-control" value="{{ old('password') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">CNIC <span class="text-danger">*</span></p>
    <input type="text" name="cnic" class="form-control" value="{{ isset($user) ? $user->cnic : old('cnic') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Address <span class="text-danger"></span></p>
    <textarea placeholder="" name="address" class="form-control" rows="3" data-gramm="false" wt-ignore-input="true">{{ isset($user) ? $user->address : old('address') }}</textarea>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Service Provider Type<span class="text-danger">*</span></p>
    <select name="service_provider_type" {{ isset($user) ? 'disabled' : '' }} class="form-select">
        <option value="omc" {{ isset($user) && $user->role == 'omc' ? 'selected' : '' }}>OMC</option>
        <option value="insurance" {{ isset($user) && $user->role == 'insurance' ? 'selected' : '' }}>Insurance Company
        </option>
        <option value="tollgate" {{ isset($user) && $user->role == 'tollgate' ? 'selected' : '' }}>Toll Gate</option>
    </select>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted d-block">Gender <span class="text-danger">*</span></p>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male"
            {{ $gender == 'Male' ? 'checked' : '' }}>
        <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female"
            {{ $gender == 'Female' ? 'checked' : '' }}>
        <label class="form-check-label" for="inlineRadio2">Female</label>
    </div>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Profile Image <span class="text-danger">*</span></p>
    <input type="file" name="profile_image" class="form-control">
    @if (isset($user) && $user->profile_image != null)
        <div class="sh-15 me-1 mb-1 d-inline-block mt-2">
            <img class="rounded float-start" width="200px" src="{{ asset($user->profile_url) }}"
                alt="Service Provider">
        </div>
    @endif
</div>
