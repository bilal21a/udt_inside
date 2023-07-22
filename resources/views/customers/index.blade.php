@extends('layouts.app')

@section('content')
    @include('common.alert.alert')

    @php
        $tableName = 'datatable';
        $tableData = ['Image', 'Name', 'Email', 'Phone', 'CNIC', 'Address', 'Gender', 'Actions'];
    @endphp
    @include('common.table.table')

    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray = ['profile_image', 'full_name', 'email', 'phone', 'cnic', 'address', 'gender', 'action'];
        var get_data_url = "{{ route('get_customers') }}"
    </script>
    @include('common.js.get_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('customers.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection
