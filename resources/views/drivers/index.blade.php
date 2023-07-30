@extends('layouts.app')
@section('header')
    Drivers Managment
    @if ($customer_id != null)
        <a href="{{ route('drivers.create', ['customer' => $customer_id]) }}"
            class="btn btn-primary d-flex align-items-center justify-content-center mt-1">
            <i class="ri-add-circle-line fs-16 align-middle me-1"></i>Add Driver
        </a>
    @endif
@endsection
@section('content')
    @include('common.alert.alert')
    @php
        $table_name = 'Drivers List';
        $table_id = 'datatable';
        $tableData = $customer_id != null ? ['Image', 'Name', 'Email', 'Phone', 'CNIC', 'Address', 'Gender', 'Actions'] : ['Image', 'Name', 'Email', 'Phone', 'Customer', 'CNIC', 'Address', 'Gender'];
    @endphp

    {{-- -----Table----- --}}
    @include('common.table.table')
    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray =
            @if ($customer_id != null)
                ['profile_image', 'full_name', 'email', 'phone', 'cnic', 'address', 'gender', 'action']
            @else
                ['profile_image', 'full_name', 'email', 'phone', 'customer', 'cnic', 'address', 'gender']
            @endif ;
        var get_data_url = "{{ route('get_drivers', ['customer' => $customer_id]) }}"
    </script>
    @include('common.js.get_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('drivers.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection
