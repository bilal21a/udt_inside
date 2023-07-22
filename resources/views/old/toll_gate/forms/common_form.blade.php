<div class="mb-3">
    <label class="form-label">Toll Gate Name <span class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control" value="{{ isset($tollGate) ? $tollGate->name : old('name') }}">
</div>
<div class="mb-3">
    <label class="form-label">Toll Gate Address <span class="text-danger">*</span></label>
    <input type="text" name="address" class="form-control" value="{{ isset($tollGate) ? $tollGate->address : old('address') }}">
</div>
<div class="mb-3">
    <label class="form-label">STV Fee <span class="text-danger">*</span></label>
    <input type="text" name="stv_fee" class="form-control" value="{{ isset($tollGate) ? $tollGate->stv_fee : old('stv_fee') }}">
</div>
<div class="mb-3">
    <label class="form-label">LTV Fee <span class="text-danger">*</span></label>
    <input type="text" name="ltv_fee" class="form-control" value="{{ isset($tollGate) ? $tollGate->ltv_fee : old('ltv_fee') }}">
</div>
<div class="mb-3">
    <label class="form-label">Image<span class="text-danger">*</span></label>
    <input type="file" name="image" class="form-control">
    @if (isset($tollGate) && $tollGate->image != null)
        <div class="sh-15 me-1 mb-1 d-inline-block">
            <img src="{{ $tollGate->toll_gate_image_url }}" class="img-fluid-height rounded-md" alt="thumb">
        </div>
    @endif
</div>
<div class="mb-3">
    <label class="form-label">Note <span class="text-danger">*</span></label>
    <textarea placeholder="" name="note" class="form-control" rows="3" data-gramm="false" wt-ignore-input="true">{{ isset($tollGate) ? $tollGate->note : old('note') }}</textarea>
</div>
<input type="hidden" name="service_provider" value="{{ $service_provider }}">
