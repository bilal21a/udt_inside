@extends('layouts.app')
@section('header')
    Edit Insurance Company
@endsection
@section('content')
    @include('common.alert.alert')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Edit Insurance Company </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('insurance_company.update', $id) }}" method="POST" enctype="multipart/form-data"
                        class="row gy-4">
                        @csrf
                        @method('PUT')
                        @include('insurance_company.forms.common_form')
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="success_message">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @dd($insurance_company->type_insurance_service) --}}
@section('js_after')
    <script>
        var type_insurance_plan = @json($insurance_company->type_insurance_plan);
        var type_insurance_service = @json($insurance_company->type_insurance_service);

        document.addEventListener('DOMContentLoaded', function() {
            const selectElements = document.querySelectorAll('.choices-multiple-default');
            console.log('selectElements: ', selectElements);
            selectElements.forEach((element) => {
                new Choices(element).setValue(type_insurance_plan);
            });
        });
        const multipleCancelButton = new Choices(
            '.choices-multiple-remove-button', {
                allowHTML: true,
                removeItemButton: false,
            }
        ).setValue(type_insurance_service);
    </script>
@endsection
