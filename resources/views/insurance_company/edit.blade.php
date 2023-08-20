@extends('layouts.app')
@section('header')
    Edit Insurance Company
@endsection
@section('content')
    @include('common.alert.alert')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Edit Insurance Company </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('insurance_company.update', $id) }}" method="POST" enctype="multipart/form-data"
                        class="row gy-4">
                        @csrf
                        @method('PUT')
                        @include('insurance_company.forms.common_form')
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="success_message">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@php
    $keys = $insurance_company->type_insurance_plan;
    $values = $insurance_plans;
    $result = array_intersect_key($values, array_flip($keys));
    $plans = array_values($result);

    $keys = $insurance_company->type_insurance_service;
    $values = $insurance_services;
    $result = array_intersect_key($values, array_flip($keys));
    $services = array_values($result);
@endphp
@section('js_after')
    <script>
        $(document).ready(function() {
            var map;
            var marker;
            var latInput = $('[name="lat"]');
            var lngInput = $('[name="lng"]');

            // Autocomplete functionality
            var addressField = $('[name="contact_address"]')[0];
            var autocomplete = new google.maps.places.Autocomplete(addressField);

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    // Handle invalid place selection
                    return;
                }

                latInput.val(place.geometry.location.lat());
                lngInput.val(place.geometry.location.lng());

                var position = new google.maps.LatLng(place.geometry.location.lat(), place.geometry.location
                    .lng());
                map.setCenter(position);
                marker.setPosition(position);
            });
        });
    </script>
    <script>
        var type_insurance_plan = @json($plans);
        var type_insurance_service = @json($services);
        document.addEventListener('DOMContentLoaded', function() {
            const selectElements = document.querySelectorAll('.choices-multiple-default');
            selectElements.forEach((element) => {
                console.log('element: ', element);
                console.log('type_insurance_plan: ', type_insurance_plan);
                new Choices(element).setValue(type_insurance_plan);
            });
        });
        const multipleCancelButton = new Choices(
            '.choices-multiple-remove-button', {
                allowHTML: true,
                removeItemButton: false,
            }
        ).setValue(type_insurance_service);
    </script>
@endsection
