@extends('layouts.app')
@section('header')
    Toll Gates Management
    @if ($service_provider != null)
        <a href="{{ route('toll_gate.create', ['service_provider' => $service_provider]) }}"
            class="btn btn-primary d-flex align-items-center justify-content-center mt-1">
            <i class="ri-add-circle-line fs-16 align-middle me-1"></i>Add Toll Gate
        </a>
    @endif
@endsection
@section('content')
    @include('common.alert.alert')
    @php
        $table_name = 'Toll Gates List';
        $table_id = 'datatable';
        $tableData = $service_provider != null ? ['Image', 'Name', 'Address', 'STV Fee', 'LTV Fee', 'Actions'] : ['Image', 'Name', 'Address', 'STV Fee', 'Service Provider', 'LTV Fee'];

    @endphp
    @include('common.table.table')
    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray =
            @if ($service_provider != null)
                ['image', 'name', 'address', 'stv_fee', 'ltv_fee', 'action'];
            @else
                ['image', 'name', 'address', 'service_provider', 'stv_fee', 'ltv_fee'];
            @endif
        var get_data_url = "{{ route('get_toll_gate', ['service_provider' => $service_provider]) }}"
    </script>
    @include('common.js.get_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('toll_gate.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection
