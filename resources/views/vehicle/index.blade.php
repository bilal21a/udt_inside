@extends('layouts.app')
<style>
    .picheight {
        height: 96px !important;
        width: 90px !important;
        border-radius: 10px 0px 0px 10px;
    }
</style>
@section('content')
    @include('common.alert.alert')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h1 class="mb-0 pb-0 display-4" id="title">Vehicles Managment</h1>
                </div>
            </div>
        </div>

        <a class="btn btn-icon btn-icon-start btn-primary mb-4" href="{{ route('vehicles.create') }}">
            <i data-acorn-icon="plus"></i>
            <span>Add Vehicles</span>
        </a>

        {{-- -----Table----- --}}
        @php
            $tableName = 'datatable';
            $tableData = ['Vehicle Image','Vehicle Make', 'Vehicle Color', 'Vehicle model', 'Vehicle Engine Type', 'Vehicle Year','Average(KM Per Gallon)','License Plate','Vehicle Status', 'Actions'];
        @endphp
        @include('common.table.table')
    </div>

    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray = ['vehicle_image','make', 'color', 'model', 'engine_type', 'year','avg_kmpg','license_plate','vehicle_status','action'];
        var get_data_url = "{{ route('get_vehicles') }}"
    </script>
    @include('common.js.get_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('vehicles.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection
