@extends('layouts.app')

@section('content')
    <!-- Title and Top Buttons Start -->

    <div class="page-title-container">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h1 class="mb-0 pb-0 display-4" id="title">Edit Vehicles</h1>
            </div>
        </div>
    </div>

    @include('common.alert.alert')
    <div class="card mb-5">
        <div class="card-body">
            <form action="{{ route('vehicles.update',$vehicle->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('vehicle.forms.common_form')
                <button type="submit" class="btn btn-primary" id="success_message">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('js_after')
    <script></script>
@endsection
