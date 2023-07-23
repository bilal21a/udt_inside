@extends('layouts.app')
@section('header')
    Service Provider Managment
    <a href="{{ route('serviceprovider.create') }}"
        class="btn btn-primary d-flex align-items-center justify-content-center mt-1">
        <i class="ri-add-circle-line fs-16 align-middle me-1"></i>Add Service Provider
    </a>
@endsection
@section('content')
    @include('common.alert.alert')
    @php
        $table_name = 'Service Provider List';
        $table_id = 'datatable';
        $tableData = ['Image', 'Name', 'Type', 'Email', 'Phone', 'CNIC', 'Address', 'Gender', 'Actions'];
    @endphp
    @include('common.table.table')

    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray = ['profile_image', 'full_name', 'type', 'email', 'phone', 'cnic', 'address', 'gender',
            'action'
        ];
        var get_data_url = "{{ route('get_service_provider') }}"
    </script>
    @include('common.js.get_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('customers.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection
