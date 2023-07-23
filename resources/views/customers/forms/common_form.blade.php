{{-- @php
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
    <label class="form-label">Password @if (!isset($user))
            <span class="text-danger">*</span>
        @endif
    </label>
    <input type="text" name="password" class="form-control" value="{{ old('password') }}">
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

<br><br><br> --}}


                    {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <p class="mb-2 text-muted">Basic Input:</p>
                        <input type="text" class="form-control" id="input">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Form Input With Label</label>
                        <input type="text" class="form-control" id="input-label">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-placeholder" class="form-label">Form Input With Placeholder</label>
                        <input type="text" class="form-control" id="input-placeholder" placeholder="Placeholder">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-text" class="form-label">Type Text</label>
                        <input type="text" class="form-control" id="input-text" placeholder="Text">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-number" class="form-label">Type Number</label>
                        <input type="number" class="form-control" id="input-number" placeholder="Number">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-password" class="form-label">Type Password</label>
                        <input type="password" class="form-control" id="input-password" placeholder="Password">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-email" class="form-label">Type Email</label>
                        <input type="email" class="form-control" id="input-email" placeholder="Email@xyz.com">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-tel" class="form-label">Type Tel</label>
                        <input type="tel" class="form-control" id="input-tel" placeholder="+1100-2031-1233">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-date" class="form-label">Type Date</label>
                        <input type="date" class="form-control" id="input-date">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-week" class="form-label">Type Week</label>
                        <input type="week" class="form-control" id="input-week">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-month" class="form-label">Type Month</label>
                        <input type="month" class="form-control" id="input-month">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-time" class="form-label">Type Time</label>
                        <input type="time" class="form-control" id="input-time">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-datetime-local" class="form-label">Type datetime-local</label>
                        <input type="datetime-local" class="form-control" id="input-datetime-local">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-search" class="form-label">Type Search</label>
                        <input type="search" class="form-control" id="input-search" placeholder="Search">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-submit" class="form-label">Type Submit</label>
                        <input type="submit" class="form-control" id="input-submit" value="Submit">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-reset" class="form-label">Type Reset</label>
                        <input type="reset" class="form-control" id="input-reset">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-button" class="form-label">Type Button</label>
                        <input type="button" class="form-control btn btn-primary" id="input-button" value="Button">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-xl-3">
                                <label class="form-label">Type Color</label>
                                <input class="form-control form-input-color" type="color" value="#136bd0">
                            </div>
                            <div class="col-xl-5">
                                <div class="form-check">
                                    <p class="mb-3 px-0 text-muted">Type Checkbox</p>
                                    <input class="form-check-input ms-2" type="checkbox" value=""
                                        checked="">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-check">
                                    <p class="mb-3 px-0 text-muted">Type Radio</p>
                                    <input class="form-check-input ms-2" type="radio" checked="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-file" class="form-label">Type File</label>
                        <input class="form-control" type="file" id="input-file">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label class="form-label">Type Url</label>
                        <input class="form-control" type="url" name="website" placeholder="http://example.com">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-disabled" class="form-label">Type Disabled</label>
                        <input type="text" id="input-disabled" class="form-control" placeholder="Disabled input"
                            disabled="">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-readonlytext" class="form-label">Input Readonly Text</label>
                        <input type="text" readonly="" class="form-control-plaintext" id="input-readonlytext"
                            value="email@example.com">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="disabled-readonlytext" class="form-label">Disabled Readonly Input</label>
                        <input class="form-control" type="text" value="Disabled readonly input"
                            id="disabled-readonlytext" aria-label="Disabled input example" disabled=""
                            readonly="">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label class="form-label">Type Readonly Input</label>
                        <input class="form-control" type="text" value="Readonly input here..."
                            aria-label="readonly input example" readonly="">
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="text-area" class="form-label">Textarea</label>
                        <textarea class="form-control" id="text-area" rows="1"></textarea>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-DataList" class="form-label">Datalist example</label>
                        <input class="form-control" list="datalistOptions" id="input-DataList"
                            placeholder="Type to search...">
                        <datalist id="datalistOptions">
                            <option value="San Francisco">
                            </option>
                            <option value="New York">
                            </option>
                            <option value="Seattle">
                            </option>
                            <option value="Los Angeles">
                            </option>
                            <option value="Chicago">
                            </option>
                        </datalist>
                    </div>
 --}}

 @php
    $gender = isset($user) ? $user->gender : old('gender');
@endphp


 <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">First Name <span class="text-danger">*</span></p>
    <input type="text" name="first_name" class="form-control" value="{{ isset($user) ? $user->first_name : old('first_name') }}">
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Last Name <span class="text-danger">*</span></p>
    <input type="text" name="last_name" class="form-control" value="{{ isset($user) ? $user->last_name : old('last_name') }}">
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Phone <span class="text-danger">*</span></p>
    <input type="text" name="phone" class="form-control date-picker" id="" value="{{ isset($user) ? $user->phone : old('phone') }}">
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Email address <span class="text-danger">*</span></p>
    <input type="email" name="email" class="form-control" value="{{ isset($user) ? $user->email : old('email') }}">
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Password @if (!isset($user))<span class="text-danger">*</span>@endif</p>
    <input type="text" name="password" class="form-control" value="{{ old('password') }}">
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">CNIC <span class="text-danger">*</span></p>
    <input type="text" name="cnic" class="form-control" value="{{ isset($user) ? $user->cnic : old('cnic') }}">
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Profile Image <span class="text-danger">*</span></p>
    <input type="file" name="profile_image" class="form-control">
    @if (isset($user) && $user->profile_image != null)
            <img class="rounded float-start" width="200px" src="{{ asset($user->profile_url) }}" alt="Edit Car">
    @endif
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Address <span class="text-danger">*</span></p>
    <input placeholder="" name="address" class="form-control" rows="3" data-gramm="false" wt-ignore-input="true" value="{{ isset($user) ? $user->address : old('address') }}" >
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Gender <span class="text-danger">*</span></p>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" {{ $gender == 'Male' ? 'checked' : '' }}>
        <label class="form-check-label" for="inlineRadio1">Male</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" {{ $gender == 'Female' ? 'checked' : '' }}>
        <label class="form-check-label" for="inlineRadio2">Female</label>
    </div>
</div>
