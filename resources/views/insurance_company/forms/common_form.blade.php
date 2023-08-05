<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Company Name <span class="text-danger">*</span></p>
    <input type="text" name="organization_name" id="organization_name" class="form-control" required value="{{ isset($insurance_company) ? $insurance_company->name : old('organization_name') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Contact Person <span class="text-danger">*</span></p>
    <input type="text" name="contact_person" id="contact_person" class="form-control" required value="{{ isset($insurance_company) ? $insurance_company->name : old('contact_person') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Contact Email Address<span class="text-danger">*</span></p>
    <input type="email" name="contact_email" id="contact_email" class="form-control" required>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Company Address <span class="text-danger">*</span></p>
    <input type="text" name="contact_address" id="contact_address" class="form-control" required>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Company Website <span class="text-danger">*</span></p>
    <input type="url" name="contact_website" id="contact_website" class="form-control" required>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Phone No. <span class="text-danger">*</span></p>
    <input type="text" name="phone" id="phone" class="form-control" required>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Lisence No.<span class="text-danger">*</span></p>
    <input type="text" name="Lisence_no" id="Lisence_no" class="form-control" required>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Insurance Services Type<span class="text-danger">*</span></p>
    <select name="type_insurance_service" class="form-select">
        <option value="health">Health</option>
        <option value="life">Life</option>
        <option value="funeral">Funeral</option>
        <option value="injuries">injuries</option>
    </select>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Insurance Services Type<span class="text-danger">*</span></p>
    <select name="type_insurance_plan" class="form-select">
        <option value="individual_plan">Individual Plan</option>
        <option value="family_plan">Family Plan</option>
        <option value="group_plan">Group Plan</option>
    </select>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Company Description <span class="text-danger">*</span></p>
    <textarea name="company_description" id="company_description" class="form-control" rows="4" required></textarea>
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Upload Licence <span class="text-danger">*</span></p>
    <input type="file" name="upload_license" id="upload_license" class="form-control" required>
</div>

<input type="hidden" name="service_provider" value="{{ $service_provider }}">

