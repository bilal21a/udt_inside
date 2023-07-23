@extends('layouts.app')

@section('header')
    {{ $user->full_name }}
@endsection
@section('content')
{{-- @dd($user) --}}
    <div class="row">
        <div class="col-xxl-4 col-xl-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body p-0">
                    <div class="d-sm-flex align-items-top p-4 border-bottom border-block-end-dashed main-profile-cover">
                        <div>
                            <span class="avatar avatar-xxl avatar-rounded me-3">
                                <img src="{{ $user->profile_url }}" alt="">
                            </span>
                        </div>
                        <div class="flex-fill main-profile-info">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="fw-semibold mb-1 text-fixed-white">{{ $user->full_name }}</h6>
                            </div>
                            <p class="mb-1 text-muted text-fixed-white op-7">Customer</p>
                            <p class="fs-12 text-fixed-white mb-4 op-5">
                                <span class="me-3"><i class="ri-building-line me-1 align-middle"></i>{{ $user->address }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="p-4 border-bottom border-block-end-dashed">
                        <p class="fs-15 mb-2 me-4 fw-semibold">Contact Information :</p>
                        <div class="text-muted">
                            <p class="mb-2">
                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                    <i class="ri-mail-line align-middle fs-14"></i>
                                </span>
                                {{ $user->email }}
                            </p>
                            <p class="mb-2">
                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                    <i class="ri-phone-line align-middle fs-14"></i>
                                </span>
                                {{ $user->phone }}
                            </p>
                            <p class="mb-0">
                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                    <i class="ri-map-pin-line align-middle fs-14"></i>
                                </span>
                                {{ $user->address }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-8 col-xl-12">
            <!-- Overview Tab Start -->
            <div class="tab-pane fade show active" id="overviewTab" role="tabpanel">
                <!-- Stats Start -->
                <h1 class="page-title fw-semibold fs-18 mb-0">Stats</h1>
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-top gap-2">
                                    <div class="me-1">
                                        <span class="avatar avatar-lg bg-primary">
                                            <i class="ti ti-car fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <h5 class="d-block fw-semibold fs-18 mb-1">Vehicles</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="text-muted fs-12">Total Vehicles</div>
                                            <div class="text-success">{{ count($vehicles) }}</div>
                                        </div>
                                        <a href="{{ route('vehicles.index', ['customer' => $id]) }}"
                                            class="text-primary fs-12">View All<i
                                                class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap gap-2 align-items-top">
                                    <div class="me-1">
                                        <span class="avatar avatar-lg bg-danger">
                                            <i class="ti ti-steering-wheel fs-20"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <h5 class="d-block fw-semibold fs-18 mb-1">Drivers</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="text-muted fs-12">Total Drivers</div>
                                            <div class="text-success">{{ count($drivers) }}</div>
                                        </div>
                                        <a href="{{ route('drivers.index', ['customer' => $id]) }}"
                                            class="text-danger fs-12">View All<i
                                                class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    @php
                        $table_name = 'Assigned Drivers List
                            <button class="btn btn-primary btn-sm d-flex align-items-center justify-content-center mt-1" type="button"
                                data-bs-toggle="modal" onclick="addFormShow()" data-bs-target="#myModal">
                                <i class="ri-add-circle-line fs-16 align-middle me-1"></i>Assign Driver
                            </button>';
                        $table_id = 'datatable';
                        $tableData = ['Driver', 'Vehicle', 'Actions'];
                    @endphp
                    @include('common.table.table')

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
        var add_form_url = "{{ route('assigned_drivers.create', ['customer_id' => $id]) }}"
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
