@extends('layouts.app')

@section('header')
    Customers Managment
    <a href="{{ route('customers.create') }}" class="btn btn-primary d-flex align-items-center justify-content-center mt-1">
        <i class="ri-add-circle-line fs-16 align-middle me-1"></i>Add Customer
    </a>
@endsection
@section('content')
    @include('common.alert.alert')
    @php
        $table_name = 'Customers List';
        $table_id = 'datatable';
        $tableData = ['Image', 'Name', 'Email', 'Phone', 'Address', 'Gender', 'Actions'];
    @endphp
    @include('common.table.table')

    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray = ['profile_image', 'full_name', 'email', 'phone', 'address', 'gender', 'action'];
        var get_data_url = "{{ route('get_customers') }}"
    </script>
    @include('common.js.get_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('customers.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection
