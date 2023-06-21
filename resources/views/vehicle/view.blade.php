@extends('layouts.app')

@section('css_after')
    <style>
        .width_image {
            width: 450px;
        }

        .list_styling {
            list-style: none
        }
    </style>
@endsection
@section('content')
    {{-- @dd($vehicle) --}}
    <div class="page-title-container">
        <div class="page-title-container">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h1 class="mb-0 pb-0 display-4 ms-3" id="title">View Vehicle Info</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Title Start -->
            <div class="col-3"></div>
            <div class="col-4 col-md-7">
                <img class="width_image" src="{{ $vehicle->vehicle_image_url }}"alt="">
            </div>
            <div class="col-5"></div>

        </div>
        <div>
            <div>
                <div class="row mt-5 pt-4">
                    <div class="col-3"></div>
                    <div class="col-6 mt-5 h5 d-flex " style="font-size: 17px; line-height: 25px">
                        <div class="me-5">
                            <ul class="p-0 list_styling">
                                <li class="mb-1">Maker</li>
                                <li class="mb-1">Model</li>
                                <li class="mb-1">Vehicle type</li>
                                <li class="mb-1">Year of issue</li>
                                <li class="mb-1">Mileage</li>
                                <li class="mb-1">Listing status</li>
                                <li class="mb-1">Price</li>
                                <li class="mb-1">How Long You Have Owned The Vehicle?</li>
                                <li class="mb-1">How Many Kilometer Will This Car <br>Travels Over Next 12 Months</li>
                            </ul>
                        </div>
                        <div class="ms-5">
                            <ul class="p-0 list_styling">
                                <li class="mb-1">{{ $vehicle->make }}</li>
                                <li class="mb-1">{{ $vehicle->model }}</li>
                                <li class="mb-1"> {{ $vehicle->engine_type }}</li>
                                <li class="mb-1"> {{ $vehicle->year }}</li>
                                <li class="mb-1">{{ $vehicle->avg_kmpg }}</li>
                                <li class="mb-1"> {{ $vehicle->status == true ? 'Active' : 'Inactive' }}</li>
                                <li class="mb-1"> {{ $vehicle->current_car_value }}</li>
                                <li class="mb-1"> {{ $vehicle->vehicle_owning_time }}</li>
                                <li class="mb-1"> {{ $vehicle->car_travel_distance }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
