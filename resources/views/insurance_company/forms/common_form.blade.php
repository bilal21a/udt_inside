@php
    $insurance_plans = ['health' => 'Health', 'life' => 'Life', 'funeral' => 'funeral', 'injuries' => 'injuries'];
    $insurance_services = ['individual_plan' => 'Individual Plan', 'family_plan' => 'Family Plan', 'group_plan' => 'Group Plan'];
@endphp
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Company Name <span class="text-danger">*</span></p>
    <input type="text" name="organization_name" id="organization_name" class="form-control" required
        value="{{ isset($insurance_company) ? $insurance_company->organization_name : old('organization_name') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Contact Person <span class="text-danger">*</span></p>
    <input type="text" name="contact_person" id="contact_person" class="form-control" required
        value="{{ isset($insurance_company) ? $insurance_company->contact_person : old('contact_person') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Contact Email Address<span class="text-danger">*</span></p>
    <input type="email" name="contact_email" id="contact_email" class="form-control" required
        value="{{ isset($insurance_company) ? $insurance_company->contact_email : old('contact_email') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Company Address <span class="text-danger">*</span></p>
    <input type="text" name="contact_address" id="contact_address" class="form-control" required
        value="{{ isset($insurance_company) ? $insurance_company->contact_address : old('contact_address') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Company Website <span class="text-danger">*</span></p>
    <input type="url" name="contact_website" id="contact_website" class="form-control" required
        value="{{ isset($insurance_company) ? $insurance_company->contact_website : old('contact_website') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Phone No. <span class="text-danger">*</span></p>
    <input type="text" name="phone" id="phone" class="form-control" required
        value="{{ isset($insurance_company) ? $insurance_company->phone : old('phone') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Insurance Services Type<span class="text-danger">*</span></p>
    <select class="form-control choices-multiple-default" name="type_insurance_plan[]" multiple>
        @foreach ($insurance_plans as $key => $plan)
            @if (!in_array($key, $insurance_company->type_insurance_plan))
                <option value="{{ $key }}">{{ $plan }}</option>
            @endif
        @endforeach
    </select>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Insurance Services Type<span class="text-danger">*</span></p>
    <select class="form-control choices-multiple-remove-button" name="type_insurance_service[]" multiple>
        @foreach ($insurance_services as $key => $service)
            @if (!in_array($key, $insurance_company->type_insurance_service))
                <option value="{{ $key }}">{{ $service }}</option>
            @endif
        @endforeach
    </select>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Lisence No.<span class="text-danger">*</span></p>
    <input type="text" name="Lisence_no" id="Lisence_no" class="form-control" required
        value="{{ isset($insurance_company) ? $insurance_company->contact_person : old('contact_person') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Upload Licence <span class="text-danger">*</span></p>
    <input type="file" name="upload_license" id="upload_license" class="form-control">
    {{-- @dd($insurance_company->lisence_url) --}}
    @if (isset($insurance_company) && $insurance_company->upload_license != null)
        <div class="sh-15 me-1 mb-1 d-inline-block mt-2">
            <img class="rounded float-start pt-2" width="200px" src="{{ asset($insurance_company->lisence_url) }}"
                alt="Insurance Company">
        </div>
    @endif
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Company Description <span class="text-danger">*</span></p>
    <textarea name="company_description" id="company_description" class="form-control" rows="4" required>{{ isset($insurance_company) ? $insurance_company->company_description : old('company_description') }}</textarea>
</div>

<input type="hidden" name="service_provider" value="{{ $service_provider }}">
