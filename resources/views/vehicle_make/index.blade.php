@extends('layouts.app')
@section('header')
    Vehicles Make Managment
    <a href="{{ route('vehicle_make.create') }}"
        class="btn btn-primary d-flex align-items-center justify-content-center mt-1">
        <i class="ri-add-circle-line fs-16 align-middle me-1"></i>Add Vehicles Make
    </a>
@endsection
@section('content')
    @include('common.alert.alert')

    @php
        $table_name = 'Vehicles Make List';
        $table_id = 'datatable';
        $tableData = ['Image', 'Make', 'Actions'];
    @endphp
    @include('common.table.table')

    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray = ['vehicle_image', 'make', 'action'];
        var get_data_url = "{{ route('get_vehicle_make') }}"
    </script>
    @include('common.js.get_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('vehicle_make.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection
