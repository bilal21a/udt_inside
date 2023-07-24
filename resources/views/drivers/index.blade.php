@extends('layouts.app')
@section('header')
    Drivers Managment
    <a href="{{ route('drivers.create', ['customer' => $customer_id]) }}"
        class="btn btn-primary d-flex align-items-center justify-content-center mt-1">
        <i class="ri-add-circle-line fs-16 align-middle me-1"></i>Add Driver
    </a>
@endsection
@section('content')
    @include('common.alert.alert')
    @php
        $table_name = 'Drivers List';
        $table_id = 'datatable';
        $tableData = ['Image', 'Name', 'Email', 'Phone', 'CNIC', 'Address', 'Gender', 'Actions'];
    @endphp

    {{-- -----Table----- --}}
    @include('common.table.table')
    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray = ['profile_image', 'full_name', 'email', 'phone', 'cnic', 'address', 'gender', 'action'];
        var get_data_url = "{{ route('get_drivers', ['customer' => $customer_id]) }}"
    </script>
    @include('common.js.get_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('drivers.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection
