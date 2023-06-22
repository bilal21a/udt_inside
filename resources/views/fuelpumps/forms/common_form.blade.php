@php
    $gender = isset($user) ? $user->gender : old('gender');
@endphp

<div class="mb-3">
    <label class="form-label">First Name <span class="text-danger">*</span></label>
    <input type="text" name="first_name" class="form-control"
        value="{{ isset($user) ? $user->first_name : old('first_name') }}">
</div>
<div class="mb-3">
    <label class="form-label">Last Name <span class="text-danger">*</span></label>
    <input type="text" name="last_name" class="form-control"
        value="{{ isset($user) ? $user->last_name : old('last_name') }}">
</div>
<div class="mb-3">
    <label class="form-label">Phone <span class="text-danger">*</span></label>
    <input type="text" name="phone" class="form-control date-picker" id=""
        value="{{ isset($user) ? $user->phone : old('phone') }}">
</div>
<div class="mb-3">
    <label class="form-label">Email address <span class="text-danger">*</span></label>
    <input type="email" name="email" class="form-control" value="{{ isset($user) ? $user->email : old('email') }}">
</div>
<div class="mb-3">
    <label class="form-label">Password @if(!isset($user)) <span class="text-danger">*</span> @endif</label>
    <input type="text" name="password" class="form-control"
        value="{{ old('password') }}">
</div>

<div class="mb-3">
    <label class="form-label">CNIC <span class="text-danger">*</span></label>
    <input type="text" name="cnic" class="form-control" value="{{ isset($user) ? $user->cnic : old('cnic') }}">
</div>
<div class="mb-3">
    <label class="form-label">Address <span class="text-danger">*</span></label>
    <textarea placeholder="" name="address" class="form-control" rows="3" data-gramm="false" wt-ignore-input="true">{{ isset($user) ? $user->address : old('address') }}</textarea>
</div>
<div class="mb-4">
    <label class="form-label d-block">Gender <span class="text-danger">*</span></label>
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
<div class="mb-3">
    <label class="form-label">Profile Image <span class="text-danger">*</span></label>
    <input type="file" name="profile_image" class="form-control">
    @if (isset($user) && $user->profile_image != null)
        <div class="sh-15 me-1 mb-1 d-inline-block">
            <img src="{{ asset($user->profile_url) }}" class="img-fluid-height rounded-md" alt="thumb">

        </div>
    @endif
</div>
