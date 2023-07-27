@extends('layouts.app')
@section('header')
    Vehicles Model Managment
    <a href="{{ route('vehicle_modal.create') }}"
        class="btn btn-primary d-flex align-items-center justify-content-center mt-1">
        <i class="ri-add-circle-line fs-16 align-middle me-1"></i>Add Vehicles Model
    </a>
@endsection
@section('content')
    @include('common.alert.alert')

    @php
        $table_name = 'Vehicles Model List';
        $table_id = 'datatable';
        $tableData = ['Image', 'Modal', 'Make', 'Actions'];
    @endphp
    @include('common.table.table')

    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray = ['image', 'modal', 'make', 'action'];
        var get_data_url = "{{ route('get_vehicle_modal') }}"
    </script>
    @include('common.js.get_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('vehicle_modal.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection
