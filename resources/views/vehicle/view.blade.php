@extends('layouts.app')

@section('css_after')
<style>
    .width_image{
        width: 450px;
    }
    .list_styling{
        list-style: none
    }
</style>
@endsection
@section('content')
    <div class="page-title-container">
        <div class="row">
            <!-- Title Start -->
            <div class="col-3"></div>
            <div class="col-4 col-md-7">
                <img class="width_image" src="https://www.lamborghini.com/sites/it-en/files/DAM/lamborghini/facelift_2019/homepage/families-gallery/2023/revuelto/revuelto_m.png"
                    alt="">
            </div>
            <div class="col-5"></div>

        </div>
        <div>
            <div>
                <div class="row mt-5 pt-4">
                    <div class="col-3"></div>
                    <div class="col-4 mt-5 h5 d-flex " style="font-size: 17px; line-height: 25px">
                        <div class="me-5">
                            <ul class="p-0 list_styling">
                                <li class="mb-1">Maker</li>
                                <li class="mb-1">Model</li>
                                <li class="mb-1">Vehicle type</li>
                                <li class="mb-1">Year of issue</li>
                                <li class="mb-1">Condition</li>
                                <li class="mb-1">Mileage</li>
                                <li class="mb-1">Address</li>
                                <li class="mb-1">Listing type</li>
                                <li class="mb-1">Listing status</li>
                                <li class="mb-1">Price</li>
                                <li class="mb-1">Price type</li>
                                <li class="mb-1">Description</li>
                            </ul>
                        </div>
                        <div class="ms-5">
                            <ul class="p-0 list_styling">
                                <li class="mb-1">LAMBORGHINI</li>
                                <li class="mb-1">Gallardo</li>
                                <li class="mb-1"> coupe</li>
                                <li class="mb-1"> 2009</li>
                                <li class="mb-1">used</li>
                                <li class="mb-1">33</li>
                                <li class="mb-1">San Francisco, CA, 94109, USA</li>
                                <li class="mb-1"> vehicle for rent</li>
                                <li class="mb-1"> active</li>
                                <li class="mb-1">USD 198 000.00</li>
                                <li class="mb-1">negotiable</li>
                                <li class="mb-1">2009 Lamborghini Gallardo LP560-4 Coupe</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-5"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
