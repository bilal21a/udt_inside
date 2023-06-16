@extends('layouts.app')

@section('content')
    @include('common.alert.alert')

    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h1 class="mb-0 pb-0 display-4" id="title">Customers Managment</h1>
                </div>
            </div>
        </div>

        <a class="btn btn-icon btn-icon-start btn-primary mb-4" href="">
            <i data-acorn-icon="plus"></i>
            <span>Add Customer</span>
        </a>

        {{-- -----Table----- --}}
        @php
            $tableName = 'datatable';
            $tableData = ['Name', 'Email', 'Role', 'Registration Date', 'Actions'];
        @endphp
        @include('common.table.table')
    </div>

    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray = ['first_name', 'email', 'role', 'registered_at', 'action'];
        var get_data_url = "{{ route('get_customers') }}"
    </script>
    @include('common.js.get_data')
@endsection
