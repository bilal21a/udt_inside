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
                    <h1 class="mb-0 pb-0 display-4" id="title">Drivers Management</h1>
                </div>
            </div>
        </div>


        <a class="btn btn-icon btn-icon-start btn-primary mb-4" href="{{ route('drivers.create',['customer'=>$customer_id]) }}">
            <i data-acorn-icon="plus"></i>
            <span>Add Driver</span>
        </a>

        {{-- -----Table----- --}}
        @php
            $tableName = 'datatable';
            $tableData = ['Image', 'Name', 'Email', 'Phone', 'CNIC', 'Address', 'Gender', 'Actions'];
        @endphp
        @include('common.table.table')
    </div>

    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray = ['profile_image', 'full_name', 'email', 'phone', 'cnic', 'address', 'gender', 'action'];
        var get_data_url = "{{ route('get_drivers',['customer'=>$customer_id]) }}"
    </script>
    @include('common.js.get_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('drivers.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection
