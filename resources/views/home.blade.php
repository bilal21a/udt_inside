@extends('layouts.app')
@section('header')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-9 col-xl-12">
            <div class="row">
                <div class="col-xl-4">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header  justify-content-between">
                                <div class="card-title">
                                    Fuel Stations
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled crm-top-deals mb-0">
                                    @foreach ($fuel_stations as $fuel_station)
                                        <li>
                                            <div class="d-flex align-items-top flex-wrap">
                                                <div class="me-2">
                                                    <span class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{ $fuel_station->fuel_station_image_url }}"
                                                            alt="">
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <p class="fw-semibold mb-0">{{ $fuel_station->name }}</p>
                                                    <span class="text-primary fs-12">{{ $fuel_station->capacity }}
                                                        capacity</span>
                                                    <br>
                                                    <span class="text-muted fs-12">{{ $fuel_station->address }}</span>
                                                </div>
                                                <div class="fw-semibold fs-15">{{ $fuel_station->rate_per_liter }}/liter
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-primary">
                                                <i class="ti ti-users fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Total Customers</p>
                                                    <h4 class="fw-semibold mt-1 customers">
                                                        <div class="spinner-border" role="status">
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                    </h4>
                                                </div>
                                                <div id="crm-customers"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <a class="text-primary" href="{{ route('customers.index') }}">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                </div>
                                                <div class="text-end">
                                                    <p class="mb-0 fw-semibold per-customers"></p>
                                                    <span class="text-muted op-7 fs-11">this month</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-secondary">
                                                <i class="ti ti-user fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Total Drivers</p>
                                                    <h4 class="fw-semibold mt-1 drivers">
                                                        <div class="spinner-border" role="status">
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                    </h4>
                                                </div>
                                                <div id="crm-divers"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <a class="text-secondary" href="{{ route('drivers.index') }}">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                </div>
                                                <div class="text-end">
                                                    <p class="mb-0 fw-semibold per-divers"></p>
                                                    <span class="text-muted op-7 fs-11">this month</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-success">
                                                <i class="ti ti-car fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Total Vehicles</p>
                                                    <h4 class="fw-semibold mt-1 vehicles">
                                                        <div class="spinner-border" role="status">
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                    </h4>
                                                </div>
                                                <div id="crm-vehicles"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <a class="text-success" href="{{ route('vehicles.index') }}">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                </div>
                                                <div class="text-end">
                                                    <p class="mb-0 fw-semibold per-vehicles"></p>
                                                    <span class="text-muted op-7 fs-11">this month</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-warning">
                                                <i class="ti ti-gas-station fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Fuel Stations</p>
                                                    <h4 class="fw-semibold mt-1 fuel_stations">
                                                        <div class="spinner-border" role="status">
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                    </h4>
                                                </div>
                                                <div id="crm-fuel_stations"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <a class="text-warning" href="{{ route('fuel_station.index') }}">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                </div>
                                                <div class="text-end">
                                                    <p class="mb-0 fw-semibold per-fuel_stations"></p>
                                                    <span class="text-muted op-7 fs-11">this month</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-warning">
                                                <i class="ti ti-coin fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Toll Gate</p>
                                                    <h4 class="fw-semibold mt-1 toll_gates">
                                                        <div class="spinner-border" role="status">
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                    </h4>
                                                </div>
                                                <div id="crm-toll_gate"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <a class="text-warning" href="{{ route('toll_gate.index') }}">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                </div>
                                                <div class="text-end">
                                                    <p class="mb-0 fw-semibold per-toll_gate"></p>
                                                    <span class="text-muted op-7 fs-11">this month</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-md-6">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body">
                                    <div class="d-flex align-items-top justify-content-between">
                                        <div>
                                            <span class="avatar avatar-md avatar-rounded bg-warning">
                                                <i class="ti ti-activity-heartbeat fs-16"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill ms-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <div>
                                                    <p class="text-muted mb-0">Insurance Company</p>
                                                    <h4 class="fw-semibold mt-1 insurance_companies">
                                                        <div class="spinner-border" role="status">
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                    </h4>
                                                </div>
                                                <div id="crm-insurance_company"></div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                <div>
                                                    <a class="text-warning" href="{{ route('insurance_company.index') }}">View All<i
                                                            class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i></a>
                                                </div>
                                                <div class="text-end">
                                                    <p class="mb-0 fw-semibold per-insurance_company"></p>
                                                    <span class="text-muted op-7 fs-11">this month</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                New Customers
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-nowrap table-hover border table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Registerd Since</th>
                                            <th scope="col">Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center fw-semibold">
                                                        <span class="avatar avatar-sm me-2 avatar-rounded">
                                                            <img src="{{ $customer->profile_url }}" alt="img">
                                                        </span>{{ $customer->full_name }}
                                                    </div>
                                                </td>
                                                <td>{{ $customer->gender }}</td>
                                                <td>{{ $customer->email }}</td>
                                                <td>{{ $customer->created_at->diffForHumans() }}</td>
                                                <td>
                                                    {{ $customer->address }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-12">
            <div class="row">
                <div class="col-xxl-12 col-xl-12">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Recent Activity
                                    </div>
                                </div>
                                <div class="card-body logsData">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="get_count_graph" value="{{ route('get_count_graph') }}">
    <input type="hidden" id="get_percentage" value="{{ route('get_percentage') }}">
@endsection
@section('js_after')
    <!-- CRM-Dashboard -->
    <script src="{{ asset('assets/custom/Customdashboard.js') }}"></script>
    <script>
        axios.get("{{ route('get_count') }}")
            .then(response => {
                console.log(response.data);
                var data = response.data;
                Object.entries(data).forEach(([key, value]) => {
                    console.log(key + ': ' + value);
                    $(`.${ key }`).html(value);
                    // Perform actions on each property
                });

            })
            .catch(error => {
                console.error(error);
            });


        axios.get("{{ route('show_logs') }}")
            .then(response => {
                $('.logsData').html(response.data)
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
