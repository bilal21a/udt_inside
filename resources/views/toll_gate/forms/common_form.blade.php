<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Toll Gate Name <span class="text-danger">*</span></p>
    <input type="text" name="name" class="form-control" value="{{ isset($tollGate) ? $tollGate->name : old('name') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Toll Gate Address <span class="text-danger">*</span></p>
    <input type="text" name="address" class="form-control" value="{{ isset($tollGate) ? $tollGate->address : old('address') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Latitude <span class="text-danger">*</span></p>
    <input type="text" name="lat" class="form-control" value="{{ isset($tollGate) ? $tollGate->lat : old('lat') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Longitude <span class="text-danger">*</span></p>
    <input type="text" name="lng" class="form-control" value="{{ isset($tollGate) ? $tollGate->lng : old('lng') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">STV Fee <span class="text-danger">*</span></p>
    <input type="text" name="stv_fee" class="form-control numeric" value="{{ isset($tollGate) ? $tollGate->stv_fee : old('stv_fee') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Note <span class="text-danger">*</span></p>
    <textarea placeholder="" name="note" class="form-control" rows="3" data-gramm="false" wt-ignore-input="true">{{ isset($tollGate) ? $tollGate->note : old('note') }}</textarea>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">LTV Fee <span class="text-danger">*</span></p>
    <input type="text" name="ltv_fee" class="form-control numeric" value="{{ isset($tollGate) ? $tollGate->ltv_fee : old('ltv_fee') }}">
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <p class="mb-2 text-muted">Image<span class="text-danger">*</span></p>
    <input type="file" name="image" class="form-control">
    @if (isset($tollGate) && $tollGate->image != null)
        <div class="sh-15 me-1 mb-1 d-inline-block">
            <img class="rounded float-start" width="200px" src="{{ $tollGate->toll_gate_image_url }}" alt="Toll Gate">

        </div>
    @endif
</div>
<input type="hidden" name="service_provider" value="{{ $service_provider }}">
