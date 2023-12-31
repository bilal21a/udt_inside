@extends('layouts.app')
@section('header')
    Vehicles Management
    @if ($customer_id != null)
        <a href="{{ route('vehicles.create', ['customer' => $customer_id]) }}"
            class="btn btn-primary d-flex align-items-center justify-content-center mt-1">
            <i class="ri-add-circle-line fs-16 align-middle me-1"></i>Add Vehicles
        </a>
    @endif
@endsection
@section('content')
    @include('common.alert.alert')

    @php
        $table_name = 'Vehicles List';
        $table_id = 'datatable';
        $tableData = $customer_id != null ? ['Vehicle Image', 'Vehicle Make', 'Vehicle Color', 'Vehicle model', 'Vehicle Engine Type', 'Vehicle Year', 'Average(KM Per Gallon)', 'License Plate', 'License No', 'Vehicle Status', 'Actions'] : ['Vehicle Image', 'Vehicle Make', 'Vehicle Color', 'Vehicle model', 'Vehicle Engine Type', 'Vehicle Year', 'Customer', 'Average(KM Per Gallon)', 'License Plate', 'License No', 'Vehicle Status'];
    @endphp
    @include('common.table.table')


    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray =
            @if ($customer_id != null)
                ['vehicle_image', 'make', 'color', 'model', 'engine_type', 'year', 'avg_kmpg', 'license_plate',
                    'license_no', 'vehicle_status', 'action'
                ]
            @else
                ['vehicle_image', 'make', 'color', 'model', 'engine_type', 'year', 'customer', 'avg_kmpg', 'license_plate',
                    'license_no', 'vehicle_status']
            @endif ;
        var get_data_url = "{{ route('get_vehicles', ['customer' => $customer_id]) }}"
    </script>
    @include('common.js.get_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('vehicles.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection
