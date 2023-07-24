@extends('layouts.app')
@section('header')
    Toll Gates Management
    <a href="{{ route('toll_gate.create', ['service_provider' => $service_provider]) }}"
        class="btn btn-primary d-flex align-items-center justify-content-center mt-1">
        <i class="ri-add-circle-line fs-16 align-middle me-1"></i>Add Toll Gate
    </a>
@endsection
@section('content')
    @include('common.alert.alert')
    @php
        $table_name = 'Toll Gates List';
        $table_id = 'datatable';
        $tableData = ['Image', 'Name', 'Email', 'Phone', 'CNIC', 'Address', 'Gender', 'Actions'];
    @endphp
    @include('common.table.table')
    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray = ['image', 'name', 'address', 'status', 'action'];
        var get_data_url = "{{ route('get_toll_gate', ['service_provider' => $service_provider]) }}"
    </script>
    @include('common.js.get_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('toll_gate.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection
