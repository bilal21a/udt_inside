@extends('layouts.app')
@section('header')
    Add Insurance Company
@endsection
@section('content')
    @include('common.alert.alert')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Add Insurance Company
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('insurance_company.store') }}" method="POST" enctype="multipart/form-data"
                        class="row gy-4">
                        @csrf
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
        document.addEventListener('DOMContentLoaded', function() {
            const selectElements = document.querySelectorAll('.choices-multiple-default');
            console.log('selectElements: ', selectElements);
            selectElements.forEach((element) => {
                new Choices(element).setValue();
            });
        });
        const multipleCancelButton = new Choices(
            '.choices-multiple-remove-button', {
                allowHTML: true,
                removeItemButton: false,
            }
        );
    </script>
@endsection
