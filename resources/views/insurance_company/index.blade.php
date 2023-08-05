@extends('layouts.app')
@section('header')
    Insurance Company
     <a href="{{ route('insurance_company.create') }}"
        class="btn btn-primary d-flex align-items-center justify-content-center mt-1">
        <i class="ri-add-circle-line fs-16 align-middle me-1"></i>Add Insurance Company
    </a>
@endsection
@section('content')
    @include('common.alert.alert')
    @php
        $table_name = 'Insurance Company List';
        $table_id = 'datatable';
        $tableData = ['Image','Organization Name','Contact Person','Contact Email Address','Company Address','Lisence No.','Insurance Services Type','Insurance Plan Type','Phone No.','Action'];
    @endphp
    @include('common.table.table')

    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray = ['profile_image','organization_name','contact_person','contact_email','contact_address','Lisence_no','type_insurance_service','type_insurance_plan','phone','action'];
        var get_data_url = "{{ route('get_insurance_company') }}"
    </script>
    @include('common.js.get_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('customers.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection