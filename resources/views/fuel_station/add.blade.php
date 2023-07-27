@extends('layouts.app')
@section('header')
    Add Fuel pumps
@endsection
@section('content')
    @include('common.alert.alert')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Add Fuel pumps
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('fuel_station.store') }}" method="POST" enctype="multipart/form-data" class="row gy-4">
                        @csrf
                        @include('fuel_station.forms.common_form')
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

            function initializeMap() {
                var lat = parseFloat(latInput.val()) || 0;
                var lng = parseFloat(lngInput.val()) || 0;

                var mapOptions = {
                    center: {
                        lat: lat,
                        lng: lng
                    },
                    zoom: 12
                };

                map = new google.maps.Map(document.getElementById('map'), mapOptions);

                marker = new google.maps.Marker({
                    position: {
                        lat: lat,
                        lng: lng
                    },
                    map: map,
                    draggable: true
                });

                google.maps.event.addListener(marker, 'dragend', function() {
                    var position = marker.getPosition();
                    latInput.val(position.lat());
                    lngInput.val(position.lng());
                });
            }

            // Initialize the map
            initializeMap();

            // Handle adjust button click
            $('#adjust-button').click(function() {
                var geocoder = new google.maps.Geocoder();
                var address = $('[name="address"]').val();

                geocoder.geocode({
                    'address': address
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var position = results[0].geometry.location;
                        latInput.val(position.lat());
                        lngInput.val(position.lng());

                        map.setCenter(position);
                        marker.setPosition(position);
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            });

            // Autocomplete functionality
            var addressField = $('[name="address"]')[0];
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
@endsection
