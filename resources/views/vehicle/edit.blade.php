@extends('layouts.app')
@section('header')
    Edit Vehicle
@endsection
@section('content')
    @include('common.alert.alert')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Edit Vehicle
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data" class="row gy-4">
                        @csrf
                        @method('PUT')
                        @include('vehicle.forms.common_form')
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
    <script></script>
@endsection
