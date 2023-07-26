@extends('layouts.app')
@section('header')
    Fuel Satations Managment
    <a href="{{ route('fuel_station.create', ['service_provider' => $service_provider]) }}"
        class="btn btn-primary d-flex align-items-center justify-content-center mt-1">
        <i class="ri-add-circle-line fs-16 align-middle me-1"></i>Add Fuel Satation
    </a>
@endsection
@section('content')
    @include('common.alert.alert')
    @php
        $table_name = 'Customers List';
        $table_id = 'datatable';
        $tableData = ['Fuel Station Image', 'Location Title', 'Address', 'Map', 'Fuel Type', 'Status', 'Address', 'Actions'];
    @endphp
    @include('common.table.table')


    @include('common.modal.add_edit_modal')
@endsection

@section('js_after')
    {{-- **Show Data** --}}
    <script>
        var tabelDataArray = ['image', 'name', 'address', 'map', 'fuel_type', 'status', 'address', 'action'];
        var get_data_url = "{{ route('get_fuel_station', ['service_provider' => $service_provider]) }}"
    </script>
    @include('common.js.get_data')


    {{-- **Delete Data** --}}
    <script>
        var delete_data_url = '{{ route('fuel_station.destroy', ':id') }}'
    </script>
    @include('common.js.delete_data')

    <script>
        function showMap(id) {
            console.log('id: ', id);
            var showMapUrl = '{{ route('show_fuel_station_map', ':id') }}'
            url = showMapUrl.replace(':id', id);

            $.ajax({
                type: 'GET',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('.mapModalBody').html(data);
                    // initMap()
                },
            });
        }

        // function initMap() {
        //     var lat = 37.7749; // Replace with your desired latitude
        //     var lng = -122.4194; // Replace with your desired longitude

        //     var mapOptions = {
        //         center: {
        //             lat: lat,
        //             lng: lng
        //         },
        //         zoom: 12
        //     };

        //     var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        //     var marker = new google.maps.Marker({
        //         position: {
        //             lat: lat,
        //             lng: lng
        //         },
        //         map: map
        //     });
        // }
    </script>
@endsection
