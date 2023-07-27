@extends('layouts.app')
@section('header')
    Edit Vehicle Model
@endsection
@section('content')
    @include('common.alert.alert')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Edit Vehicle Model
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('vehicle_modal.update', $vehicle_modal->id) }}" method="POST"
                        enctype="multipart/form-data" class="row gy-4">
                        @csrf
                        @method('PUT')
                        @include('vehicle_modal.forms.common_form')
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="success_message">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
