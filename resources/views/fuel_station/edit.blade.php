@extends('layouts.app')
@section('header')
    Edit Fuel Station
@endsection
@section('content')
    @include('common.alert.alert')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Edit Fuel Station
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('fuel_station.update', $id) }}" method="post" enctype="multipart/form-data" class="row gy-4">
                        @csrf
                        @method('PUT')
                        @include('fuel_station.forms.common_form')
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="success_message">Sumbit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script></script>
@endsection
