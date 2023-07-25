@extends('layouts.app')
@section('header')
View Vehicles Info
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                       Vehicles Info
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Title Start -->
                        <div class="col-2">

                        </div>
                        <div class="col-5 col-md-7">
                            <img class="rounded float-start " width="320px" src="{{ $vehicle->vehicle_image_url }}"
                                alt="Edit Car">
                        </div>
                        <div class="col-5"></div>

                    </div>

                    <div class="mb-4">
                        <p class="fs-15 fw-semibold mb-2">Vehicle Details :</p>
                        <div class="row">
                            <div class="col-xl-10">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap">
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="fw-semibold">
                                                    Maker
                                                </th>
                                                <td>{{ $vehicle->make }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="fw-semibold">
                                                    Model </th>
                                                <td>
                                                    {{ $vehicle->model }} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="fw-semibold">
                                                    Vehicle type
                                                </th>
                                                <td>
                                                    {{ $vehicle->engine_type }} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="fw-semibold">
                                                    Year of issue </th>
                                                <td>
                                                    {{ $vehicle->year }} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="fw-semibold">
                                                    Mileage </th>
                                                <td>
                                                    {{ $vehicle->avg_kmpg }} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="fw-semibold">
                                                    Listing status </th>
                                                <td>
                                                    {{ $vehicle->status == true ? 'Active' : 'Inactive' }}
                                            </tr>
                                            <tr>
                                                <th scope="row" class="fw-semibold">
                                                    Price </th>
                                                <td>
                                                    {{ $vehicle->current_car_value }}
                                            </tr>
                                            <tr>
                                                <th scope="row" class="fw-semibold">
                                                    Color </th>
                                                <td>
                                                    {{ $vehicle->color }}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script></script>
@endsection
