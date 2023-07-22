@extends('layouts.app')

@section('css_after')
    <style>
        .image_radius {
            border-radius: 20px;
            height: auto !important;
            max-height: 90% !important;
        }
    </style>
@endsection
@section('content')
    {{-- @dd($user) --}}
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
            <!-- Title Start -->
            <div class="col-12 col-md-7">
                <h1 class="mb-0 pb-0 display-4" id="title">{{ $user->full_name }}</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Left Side Start -->
        <div class="col-6 col-xl-4 col-xxl-3">
            <!-- Biography Start -->
            <h2 class="small-title">Profile</h2>
            <div class="card mb-5">
                <div class="card-body">
                    <div class="d-flex align-items-center flex-column mb-4">
                        <div class="d-flex align-items-center flex-column" style="width: 300px">
                            <div class="sw-13 position-relative mb-3">
                                <img src="{{ $user->profile_url }}" class="img-fluid image_radius" alt="thumb" />
                            </div>

                            <div class="h5 mb-5">{{ $user->full_name }}</div>
                            <div class="">
                                <a href="#" class="d-block body-link mb-2">
                                    <i data-acorn-icon="phone" class="me-2" data-acorn-size="17"></i>
                                    <span class="align-middle">{{ $user->phone }}</span>
                                </a>
                                <a href="#" class="d-block body-link mb-2">
                                    <i data-acorn-icon="email" class="me-2" data-acorn-size="17"></i>
                                    <span class="align-middle">{{ $user->email }}</span>
                                </a>
                                <a href="#" class="d-block body-link mb-2">
                                    <i data-acorn-icon="pin" class="me-2" data-acorn-size="17"></i>
                                    <span class="align-middle">{{ $user->address }}</span>
                                </a>
                                <a href="#" class="d-block body-link mb-2">
                                    <i data-acorn-icon="gender" class="me-2" data-acorn-size="17"></i>
                                    <span class="align-middle">{{ $user->gender }}</span>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-8 col-xxl-9 mb-5 tab-content">
            <!-- Overview Tab Start -->
            <div class="tab-pane fade show active" id="overviewTab" role="tabpanel">
                <!-- Stats Start -->
                <h2 class="small-title">Stats</h2>
                <div class="mb-5">
                    <div class="row g-2">
                        <a class="col-6" href="{{ route('drivers.index', ['customer' => $id]) }}">
                            <div class="card hover-border-primary">
                                <div class="card-body">
                                    <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                        <span>Drivers</span>
                                        <i data-acorn-icon="user" class="text-primary"></i>
                                    </div>
                                    <div class="text-medium text-muted mb-1">Number Of Drivers</div>
                                    <div class="cta-1 text-primary">{{ count($drivers) }}</div>
                                </div>
                            </div>
                        </a>
                        <a class="col-6" href="{{ route('vehicles.index', ['customer' => $id]) }}">
                            <div class="card hover-border-primary">
                                <div class="card-body">
                                    <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                        <span>Vehicles</span>
                                        <i data-acorn-icon="car" class="text-primary"></i>
                                    </div>
                                    <div class="text-medium text-muted mb-1">Number of Vehicles</div>
                                    <div class="cta-1 text-primary">{{ count($vehicles) }}</div>
                                </div>
                            </div>
                        </a>
                        <div class="col-12">
                            <div class="card h-100">
                                <div class="card-body row g-0">
                                    <div class="col-12">
                                        <div class="cta-3">Assign Driver to Vehicle</div>
                                        <button class="btn btn-icon btn-icon-start btn-primary mb-4 mt-2" type="button"
                                            data-bs-toggle="modal" onclick="addFormShow()" data-bs-target="#myModal">
                                            <i data-acorn-icon="plus"></i>
                                            <span>Assign Driver</span>
                                        </button>
                                        @php
                                            $tableName = 'datatable';
                                            $tableData = ['Driver', 'Vehicle', 'Actions'];
                                        @endphp
                                        @include('common.table.table')
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray = ['driver', 'vehicle', 'action'];
        var get_data_url = "{{ route('assigned_drivers.get_assigned_drivers', $id) }}"
    </script>
    @include('common.js.get_data')


    {{-- **Save Data** --}}
    <script>
        var add_form_url = "{{ route('assigned_drivers.create', ['customer_id'=>$id]) }}"
        var save_data_url = "{{ route('assigned_drivers.store') }}"
        var add_title = "Assign Driver"
    </script>
    @include('common.js.add_data')


    {{-- **Update Data** --}}
    <script>
        var id = "{{ $id }}";
        var edit_form_url = '{{ route('assigned_drivers.edit', ':id') }}'
        var update_data_url = '{{ route('assigned_drivers.update', ':id') }}'
        var edit_title = "Edit User"
    </script>
    @include('common.js.edit_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('assigned_drivers.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')
@endsection
